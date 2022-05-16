<?php
$conn = new mysqli('localhost','root','','kalendarz');
//if (isset($_SESSION['Imie']) && (str_contains($_SERVER['PHP_SELF'],"login.php")||str_contains($_SERVER['PHP_SELF'],"logowanie.php"))){
//    $user_name = $_SESSION['Imie'];
//}
//else if(!isset($_SESSION['Imie']) && (str_contains($_SERVER['PHP_SELF'],"login.php")||str_contains($_SERVER['PHP_SELF'],"logowanie.php"))){
//    sleep(0.1);
//}
//else{
    //header("Location: /login.php");
//}
if (isset($_SESSION['Imie'])){
    $user_name = $_SESSION['Imie'];
}
else {
    $user_name = "";
}
$q = "SELECT id from users WHERE username = '".$user_name."'";
$result = $conn->query($q);
$obj = $result->fetch_row();
@$_SESSION['user_id'] = $obj[0];
?>
<script>
    class Zadanie
    {
        constructor(id,nazwa,data,waga,kalendarz_id){
            this.id = id;
            this.nazwa = nazwa;
            this.data = new Date(data);
            this.waga = waga;
            this.kalendarz_id = kalendarz_id;
        }
    }
    class Wydarzenie
    {
        constructor(id,nazwa,data,powtarzanie,kalendarz_id){
            this.id = id;
            this.nazwa = nazwa;
            this.data = new Date(data);
            this.powtarzanie = powtarzanie;
            this.kalendarz_id = kalendarz_id;
        }
    }
    class Kalendarz
    {
        constructor(id,kolor,nazwa,user_id){
            this.id = id;
            this.kolor = kolor;
            this.nazwa = nazwa;
            this.user_id = user_id;
        }
    }
    let zadania = [];
    let kalendarze = [];
    let wydarzenia = [];
</script>
<?php
    // zadania baza -> js
    $q = 'SELECT * FROM zadania';
    $result = $conn->query($q);
    echo "<script>\n";
    while($obj = $result->fetch_object())
    {
        echo "zadania.push(new Zadanie($obj->id,'$obj->nazwa','$obj->data','$obj->waga',$obj->kalendarz_id));\n";
    }
    // kalendarze baza -> js
    $q = 'SELECT * FROM kalendarze WHERE user_id = "'.$_SESSION['user_id'].'"'; //tylko kalendarze usera
    $result = $conn->query($q);
    while($obj = $result->fetch_object())
    {
        echo "kalendarze.push(new Kalendarz($obj->id,'$obj->kolor','$obj->nazwa',$obj->user_id));\n";
    }
    // wydarzenia baza -> js
    $q = 'SELECT * FROM wydarzenia';
    $result = $conn->query($q);
    while($obj = $result->fetch_object())
    {
        echo "wydarzenia.push(new Wydarzenie($obj->id,'$obj->nazwa','$obj->data','$obj->powtarzanie',$obj->kalendarz_id));\n";
    }
    echo "</script>\n";
?>

<script>
    wydarzenia1 = [];
    zadania1 = [];
    kalendarze.forEach(element => {                                                // filtrowanie eventów obcych
        wydarzenia.filter(x=>x.kalendarz_id === element.id).forEach(element => {   // daloby sie to zrobic lepiej,
            wydarzenia1.push(element);                                             // ale concat nie dziala :c
        });
        zadania.filter(x=>x.kalendarz_id === element.id).forEach(element => {
            zadania1.push(element);
        });
    });
    wydarzenia = wydarzenia1;
    zadania = zadania1;
    delete kalendarze1;         //(już) zbędne zmienne
    delete zadania1;   
</script>