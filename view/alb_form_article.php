 <h2><?= __("Generate Article", "alb_domaine") ?> </h2>
    <form id='form_article' methode='POST' action=''>
    <?php wp_nonce_field('insert_article_action'); ?>
    <input type='hidden' name='action' value='alb'>
    <table>
        <tr>
            <td>
                <label for=number_article><?= __("Quantity", "alb_domaine") ?> : </label>
            </td>
            <td>
                <input type='number' name='number_article' min='0' max='' value='0'/>
            </td>
        </tr>
        <tr>
            <td>
                <label for=comments_article><?= __("Comment", "alb_domaine") ?> : </label>
            </td>
            <td>
                <select name=comments_article>
                    <option id="open" value="open"><?= __("Open", "alb_domaine") ?></option>
                    <option id="closed" value="closed"><?= __("Closed", "alb_domaine") ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for=author_article><?= __("Author", "alb_domaine") ?> : </label>
            </td>
            <td>
                <select name=author_article>
                <?php foreach ($users as $user) { ?>
                    <option id="<?= $user->display_name; ?>"><?= $user->display_name; ?></option>
                <?php } ?>
                </select>
            </td>
        </tr>
    </table>
    <input type='submit' name="submit_article" value='<?= __("Generate", "alb_domaine") ?>'/>
    </form>