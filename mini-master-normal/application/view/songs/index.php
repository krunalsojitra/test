<div class="row">
	
				<div class="col-md-12">
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
            <tr>
                <td>Id</td>
                <td>Artist</td>
                <td>Track</td>
                <td>Link</td>
                <td>DELETE</td>
                <td>EDIT</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($songs as $song) {  ?>
                <tr>
                    <td><?php if (isset($song->id)) echo htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($song->firstname)) echo htmlspecialchars($song->firstname, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($song->lastname)) echo htmlspecialchars($song->lastname, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($song->email)) echo htmlspecialchars($song->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'songs/deletesong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'songs/editsong/' . htmlspecialchars($song->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
