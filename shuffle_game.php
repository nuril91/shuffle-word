<?php
function acak($array)
{
    $acak = array_rand($array);

    $katabaru = $array[$acak];

    $ubah = str_split($katabaru);

    shuffle($ubah);

    foreach ($ubah as $tebak)
    {
        echo $tebak;
    }
}

$kata = array('buku', 'komputer', 'lemari', 'melihat', 'pakaian', 'jaket', 'celana', 'kursi', 'tetangga', 'pasar');

if(isset($_POST['tebak']))
{
    if((in_array($_POST['tebak'], $kata) !== FALSE))
    {
        $count = isset($_POST['count']) ? $_POST['count']:0;
        $count++;
    }
    else
    {
        $count = isset($_POST['count']) ? $_POST['count']:0;
    }
}
else
{
    $count=0;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Acak Kata</title>
    </head>
    <body>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Tebak kata</td>
                    <td>:</td>
                    <td><?php echo acak($kata); ?></td>
                </tr>
                <tr>
                    <td>Jawab</td>
                    <td>:</td>
                    <td><input type="text" name="tebak" id="tebak" required autofocus></td>
                    <input type="hidden" name="count" id="count" value="<?php echo $count; ?>" />
                </tr>
            </table>
        </form>

        <?php
        if(isset($_POST['tebak']))
        {
            if((in_array($_POST['tebak'], $kata) !== FALSE))
            {
                echo "BENAR! Point Anda ".$count;
            }
            else
            {
                echo "SALAH! Silakan coba lagi";
            }
        }
        ?>
    </body>
</html>
