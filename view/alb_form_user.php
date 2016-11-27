 <h2><?= __("Generate users", "alb_domaine") ?></h2>
    <form id='form_user' methode='POST' action='<?php echo admin_url("admin.php"); ?>'>
    <?php wp_nonce_field('insert_user_action'); ?>
    <input type='hidden' name='action' value='alb'>
    <table>
        <tr>
            <td>
                <label for=number_user><?= __("Quantity", "alb_domaine") ?> : </label>
            </td>
            <td>
                <input type='number' name='number_user' min='0' max='' value='0'/>
            </td>
        </tr>
        <tr>
            <td>
                <label for=role_user><?= __("Role", "alb_domaine") ?> : </label>
            </td>
            <td>
                <select name=role_user>
                    <option id='administrator' value="administrator"><?= __("Administrator", "alb_domaine") ?></option>
                    <option id='editor' value="editor"><?= __("Editor", "alb_domaine") ?></option>
                    <option id='author' value="author"><?= __("Author", "alb_domaine") ?></option>
                    <option id='suscribor' value="subscribor"><?= __("Subscribor", "alb_domaine") ?></option>
                    <option id='contribuor' value="contribuor"><?= __("Contribuor", "alb_domaine") ?></option>
                </select>
            </td>
        </tr>
    </table>
    <input type='submit' name="submit" value='<?= __("Generate", "alb_domaine") ?>'/>
    </form>