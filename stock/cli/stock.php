<?php

function insertProduct ($argv){
    $option = getoption($argv);
    if (false === hasError($option)) {
        $product = save($option);
        displayProduct($product);
    }
}

function getoption($argv) {
    $key = null;
    $option = [
        "--name" => null,
        "--descr" => null,
        "--price" => null,
        "--unit" => null,
    ];
    foreach ($argv as $value) {
        if (array_key_exists($value, $option)) {
            $key = $value;
        } elseif ($key) {
            $option[$key] = $option[$key] . $value . " ";
        }
    }
    return $option;
}

function hasError($option) {
    if (null === $option["--name"] 
    && null === $option["--descr"] 
    && null === $option["--price"]
    && null === $option["--unit"]) {
        displayHelp();
        return true;
    }
    $hasError = false;
    foreach($option as $key => $value) {
        if (null === $value) {
            displayOptionError($key);
            $hasError = true;
        }
    }
    return $hasError;
}

function save ($option) {
    if (file_exists('products.json')) {
        $products = json_decode(file_get_contents('products.json'));
    } else {
        $products = [];
    }
    $product = [
        "name" => $option[ "--name"],
        "descr" => $option[ "--descr"],
        "price" => $option[ "--price"],
        "unit" => $option[ "--unit"],
    ];
    array_push($products, $product);
    file_put_contents('products.json', json_encode($products));
    return $product;
}

function displayHelp() {
    echo "\nCLI Usage:\n\n"
    . "- Product creation:\n"
    . "  --name Product Name\n"
    . "  --descr Product Description\n"
    . "  --price Product Price\n"
    . "  --unit Product Unit\n\n";
}

function displayOptionError($optionName) {
    echo "ERROR: option" . '"' . $optionName .'" is missing' . "\n";
}

function displayProduct($product) {
    echo "The product have been created: \n"
    . "- Name: " . $product["name"] . "\n"
    . "- Description: " . $product["descr"] . "\n"
    . "- Price: " . $product["price"] . "\n"
    . "- Unit: " . $product["unit"] . "\n";
}

insertProduct($argv);
