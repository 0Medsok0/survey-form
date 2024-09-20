<?php
if (!empty($_POST)) {

    $errors = array(); 

    // Проверяем фио
    if (empty($_POST['fio'])) {
        $errors[] = 'Поле fio пустое, заполните поле!';
    } else {
        $nameArray = str_split($_POST['fio']); 
        foreach ($nameArray as $char) { 
            if (!ctype_alpha($char)) { 
                $errors[] = "Поле name содержит неверный символ: '$char'";
                break;
            }
        }
    }
    // Проверяем возраст
    if (empty($_POST['age'])) {
        $errors[] = 'Поле  age пустое, заполните поле!';
    } else {
        if (strlen($_POST['age']) > 2) {
            $errors[] = 'Ввведите возраст 1-99';
        } else if (intval($_POST['age']) < 0 || intval($_POST['age']) > 100) { 
            $errors[] = 'Ввведите возраст 1-99';
        }
    }

    // Проверка пола
    if (isset($_POST['gender']) && (count($_POST['gender']) != 1)) {
        $errors[] = "Выберите только один пол";
    }

    // Проверка образования
    if (!isset($_POST['еducation'])) {
        $errors[] = "Выберите ваш уровень образования";
    }

    // Проверка языка
    if (isset($_POST['foreign_languages']) && (count($_POST['foreign_languages']) != 2)) {
        $errors[] = "Выберите два языка";
    }

    // Проходит капчу да/нет
    if (empty($_POST['capcha'])) {
        $errors[] = 'Поле capcha пустое, форма не отправлена!';
    } else {
        if (intval($_POST['capcha']) == "8") {
            print("Капча пройдена");
        }
    }

    // Выводим сообщение итоговое
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    } else {
        echo "<p style='color: green;'>Форма отправлена успешно!</p><br>";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
}
