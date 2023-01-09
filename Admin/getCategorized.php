<?php   

include "../ConnectionDB/connectDB.php";


/**
 * Esta función pinta como options las diferentes familias de productos existentes en la base de datos.
 */
function getFamilies() {
    if (isset($_GET['family'])) {
        $_SESSION['family'] = $_GET['family'];
        $conn = new ConnectDB();
        $families = $conn->getProductsFamily();
        foreach ($families as $fam) {
            if ($fam['id'] == $_SESSION['family']) {
                
                echo "<option selected='true' value=".$fam['id'].">".$fam['nombre']."</option>";
                continue;
            }
            echo $_SESSION['family'];
            echo "<option value=".$fam['id'].">".$fam['nombre']."</option>";
        }
    } elseif (isset($_SESSION['family']) && !isset($_GET['family'])) {
        $conn = new ConnectDB();
        $families = $conn->getProductsFamily();
        foreach ($families as $fam) {
            if ($fam['id'] === $_SESSION['family']) {
                echo "<option selected='true' value=".$fam['id'].">".$fam['nombre']."</option>";
                continue;
            }
            echo "<option value=".$fam['id'].">".$fam['nombre']."</option>";
        }
    } else {
        $conn = new ConnectDB();
        $families = $conn->getProductsFamily();
        foreach ($families as $fam) {
            echo "<option value=".$fam['id'].">".$fam['nombre']."</option>";
        }
}
}

/**
 * Esta función pinta como options las categorias en función de la familia escogida
 */
function getCategories() {
    $conn = new ConnectDB();
    if (isset($_GET['family'])) {
        unset($_SESSION['subcategory']);
        unset($_SESSION['category']);
        $fam = $_GET['family'];
        $_SESSION['family'] = $_GET['family'];
        $categories = $conn->getCategoriesByFamily($fam);
        foreach ($categories as $cat) {
            echo "<option value=".$cat['id'].">".$cat['nombre']."</option>";
        }
    } elseif (isset($_GET['category']) || (isset($_SESSION['category']) && !isset($_GET['family']))) {
        if( isset($_GET['category'])) {
            $_SESSION['category'] = $_GET['category'];
        }
        $categories = $conn->getCategoriesByFamily($_SESSION['family']);
        foreach ($categories as $cat) {
            if ($cat['id'] == $_SESSION['category']) {
                echo "<option selected='true' value='".$cat['id']."' >".$cat['nombre']."</option>";
                continue;
            }
                echo "<option value='".$cat['id']."' >".$cat['nombre']."</option>";
        }
    }
    else {
        echo "<option>Elige una familia</option>";
    }
   
}
/**
 * Esta función pinta como options las subcategorias en función de la categoria escogida
 */
function getSubcategories() {
    $conn = new ConnectDB();
    if (isset($_GET['category'])) {
        $sub = $_GET['category'];
        $subcategories = $conn->getSubcategoriesByCategory($sub);
        foreach ($subcategories as $sub) {
            echo "<option value=".$sub['id'].">".$sub['nombre']."</option>";
        }
    } elseif (isset($_GET['subcategory']) || (isset($_SESSION['subcategory']) && !isset($_GET['category']))) {
        if(isset($_GET['subcategory'])) {
            $_SESSION['subcategory'] = $_GET['subcategory'];
        }
        $subcategories = $conn->getSubcategoriesByCategory($_SESSION['category']);
        foreach ($subcategories as $sub) {
            if ($sub['id'] == $_SESSION['subcategory'] ) {
                echo "<option selected='true' value='".$sub['id']."'>".$sub['nombre']."</option>";
                continue;
            }
            echo "<option value='".$sub['id']."'>".$sub['nombre']."</option>";
        }
        
    }
    else {
        echo "<option>Elige una categoria</option>";
    }  
}

function subcatSelected() {
    $conn = new ConnectDB();
    if (isset($_SESSION['subcategory'])) {
        $subcat = $conn->getSubcategory($_SESSION['subcategory']);
        $_SESSION['subcategoryName'] = $subcat;
        echo "<input type='text' name='subcategory' value='".$_SESSION['subcategory']."' readonly />";
    }else {
        echo "<input type='text' name='none_subcategory' value='undefined' />";
    }
}

?>