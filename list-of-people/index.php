<?php


require_once 'vendor/autoload.php';
require_once 'app/Insert.php';
require_once 'app/Person.php';

$insert = new Insert('db.csv');


$persons = $insert->getPersons();


?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Person List</title>
        <link rel="stylesheet" href="css.css">
    </head>
    <body>

    <form action="/" method="get">
        <label ><strong> Search by Id:</strong></label>
        <input type="text" name="id">
        <input type="submit">
    </form>
    <table>
        <th>
            Name
        </th>
        <th>
            Surname
        </th>
        <th>
            Id
        </th>
        <th>
            Text
        </th>

        <?php foreach ($persons as $key => $person):?>
            <tr>
                <td>
                    <?= $person->getName()?>
                </td>
                <td>
                    <?= $person->getSurname()?>
                </td>
                <td>
                    <?= $person->getId()?>
                </td>
                <td>
                    <?= $person->getText()?>
                </td>
            </tr>


        <?php endforeach;?>

    </table>

    <div align="left">
        <form action="/" method="POST">
            <p><strong> Add new person:</strong></p>
            <label>Name</label>
            <input name="name" type="text">
            <br>
            <label>Surname</label>
            <input name="surname" type="text">
            <br>
            <label>Id</label>
            <input name="id" type="text">
            <br>
            <label>Text</label>
            <input name="text" type="text">
            <br>
            <input type="submit">
        </form>
    </div>


    </body>
    </html>

<?php


if($_GET['id']){
    $person = $insert->searchById($_GET['id']);

    $key = array_search($person, $persons);

    if(is_string($person)){
        echo 'Not found';
    }else{
        echo 'Name: ' . $person->getName() . '<br>';
        echo 'Surname: ' . $person->getSurname() . '<br>';
        echo 'Id: ' . $person->getId() . '<br>';
        echo 'Text: ' . $person->getText() . '<br>';
        echo '
                        <form action="/" method="POST">
                    <input hidden value="'. $key .'" name="key">
                    <input type="submit" value="Delete">
                </form>
        ';
    }


}


if($_POST['name'] && $_POST['surname'] && $_POST['id'] && $_POST['text']){
    $insert->addPerson($_POST['name'],$_POST['surname'], $_POST['id'], $_POST['text'] );
    $_POST['name'] = false;
    $_POST['surname'] = false;
    $_POST['id'] = false;
    $_POST['text'] = false;
    echo "<meta http-equiv='refresh' content='0'>";
}

if(isset($_POST['key'])){

    $insert->Delete($_POST['key']);

    $_POST['key'] = false;
    echo "<meta http-equiv='refresh' content='0'>";
}