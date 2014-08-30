<!DOCTYPE />
<html>
    <head>
        <title>Insert Jadwal</title>
    </head>
    <body>
        <div>
            <?php
                 echo form_open('c_jadwal/insert');
            ?>
            <table>
                <tr>
                    <td>Hari</td>
                    <td>:</td>
                    <td>
                        <select name="hari">
                            <option value="senin">Senin</option>
                            <option value="selasa">Selasa</option>
                            <option value="rabu">Rabu</option>
                            <option value="kamis">Kamis</option>
                            <option value="jumat">Jum'at</option>
                            <option value="sabtu">Sabtu</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Jam</td>
                    <td>:</td>
                    <td>
                        <select name="jam">
                            <?php
                            $i = 7;
                            while ($i <= 17) {
                                echo"<option value=" . $i . ">" . $i . "</option>";
                                $i++;
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kelompok</td>
                    <td>:</td>
                    <td>
                        <select name="kelompok">
                            <?php
                            $i = 1;
                            while ($i <= 9) {
                                echo"<option value= 0" . $i . ">0" . $i . "</option>";
                                $i++;
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Kelompok</td>
                    <td>:</td>
                    <td>
                        <input type="radio" name="jk" value="1">Ikhwan |  <input type="radio" name="jk" value="0">Akhwat
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="simpan">
                        
                    </td>
                </tr>

            </table>
              <?php
                 echo form_close();
            ?>

    </body>
</html>