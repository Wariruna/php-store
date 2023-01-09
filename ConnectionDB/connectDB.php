<?php
class ConnectDB {
    private $connect;

    function __construct()
    {
        
    }

    function connecting() {
        $this->connect = new mysqli('localhost', 'root', "","phpdb2");
        if ($this->connect->connect_errno) {
            echo "Fallo al conectar con BD";
        }
    }

    function validateUser($username, $password) {
        $this->connecting();
        $qPreparedValidate = "select username from users where username = ? and password = ?;";
        $stmt = $this->connect->prepare($qPreparedValidate);
        $stmt->bind_param("ss",$username, $password);
        $stmt->execute();
        $userFound = $stmt->get_result();

        foreach ($userFound as $user) {
            if ($user['username'] === $username ) {
                return true;
            }else {
                return false;
            }
        }
    }
    function getProducts() {
        $this->connecting();
        $qPrearedGetProducts = "select * from products";
        $stmt = $this->connect->prepare($qPrearedGetProducts);
        $stmt->execute();
        $productsFounds = $stmt->get_result();
        return $productsFounds;
    }

    function getRole($username) {
        $this->connecting();
        $qPreparedGetRole = "select role from users where username = ?;";
        $stmt = $this->connect->prepare($qPreparedGetRole);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $roleUser = $stmt->get_result();
        
        foreach ($roleUser as $role) {
            return $role['role'];
        }
    }

    function getProductsFamily() {
        $this->connecting();
        $qPreparedGetFamilies = "select * from families";
        $stmt = $this->connect->prepare($qPreparedGetFamilies);
        $stmt->execute();
        $families = $stmt->get_result();
        return $families;
    }

    function getCategory($id) {
        $this->connecting();
        $qPreparedGetCategory = "select nombre from categories where id = ?";
        $stmt = $this->connect->prepare($qPreparedGetCategory);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $category = $stmt->get_result();
        foreach ($category as $cat) {
            return $cat['nombre'];
        }
    }
    function getSubcategory($id) {
        $this->connecting();
        $qPreparedGetSubcategory = "select nombre from subcategories where id = ?";
        $stmt = $this->connect->prepare($qPreparedGetSubcategory);
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $subcategory = $stmt->get_result();
        foreach ($subcategory as $sub) {
            return $sub['nombre'];
        }
    }

    function getCategoriesByFamily($family) {
        $this->connecting();
        $qPreparedGetCategories = "select id, nombre from categories where id_family = ?;";
        $stmt = $this->connect->prepare($qPreparedGetCategories);
        $stmt->bind_param('i',$family);
        $stmt->execute();
        $categories = $stmt->get_result();
        return $categories;
    }
    function getSubcategoriesByCategory($category) {
        $this->connecting();
        $qPreparedGetSubcategories = "select id, nombre from subcategories where id_category = ?;";
        $stmt = $this->connect->prepare($qPreparedGetSubcategories);
        $stmt->bind_param('i',$category);
        $stmt->execute();
        $subcategories = $stmt->get_result();
        return $subcategories;
    }

    function addProduct($name, $price, $brand, $description, $subcategory,$img="a") {
        $this->connecting();
        $qPreparedAddProduct = "Insert into products(name,price,description,img,id_subcategory,Marca)values(?,?,?,?,?,?);";
        $stmt = $this->connect->prepare($qPreparedAddProduct);
        $stmt->bind_param('sdssis', $name,$price,$description,$img,$subcategory, $brand);
        $stmt->execute();        

    }
}

?>