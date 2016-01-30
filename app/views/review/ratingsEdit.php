<h3><?php echo $data['rating'][0]->title; ?></h3>
<h4><a href=<?php echo DIR."tales/download/".$data['rating'][0]->taleID?>>Odkaz na soubor PDF</a></h4>
<br>
<h4>Vaše recenze</h4>
<form method='post' >

    <p>Originalita<br>
        <select name="originality">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select></p>
    <p>Téma<br>
        <select name="theme">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select></p>
    <p>Kvalita zpracování<br>
        <select name="quality">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select></p>

    <button class="btn btn-default" type="submit" name="submit">Přidat</button> 
</form>