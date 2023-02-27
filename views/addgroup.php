<?php
$title = 'Add Group - Group linker';
include 'partials/header.php';
?>

<div class="content">
    <div class="wrap">
        <div class="contact-info">
            <h1 style="font-weight: bolder">Add WhatsApp Group</h1>
            <br>Group Not allowed: Child Pornography or Rape/Gang rape
            <form method="post" action="functions.php">
                <div class="contact-form">
                    <div class="contact-to">
                        <input type="url" name="link" class="text" placeholder="Enter WhatsApp Group Invite Link..." required>
                        <p style="font-size: 12px;word-wrap: break-word">Ex:-
                            https://chat.whatsapp.com/CIuEPPD7DuiEkai8nxFiZP</p>

                        <!--                        <input type="text" maxlength="100" name="gname" class="text" placeholder="Enter Group Name..." required>
                        
                        -->

                        <div class="text3">
                            <select name="category" id="">
                                <option value=''>Any Category</option>
                                <?php $cats = get_categories($pdo);
                                foreach ($cats as $cat) {
                                    $slug = $cat['slug'];
                                    $name = $cat['name'];
                                    echo "<option value='$slug'>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="text3">
                            <select name="country" slug="" class="selectbtn">
                                <option value=''>Any Country</option>
                                <?php $cats = get_countries($pdo);
                                foreach ($cats as $cat) {
                                    $slug = $cat['slug'];
                                    $name = $cat['name'];
                                    echo "<option value='$slug'>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="text3">
                            <select name="language" slug="" class="selectbtn">
                                <option value=''>Any Language</option>
                                <?php $cats = get_languages($pdo);
                                foreach ($cats as $cat) {
                                    $slug = $cat['slug'];
                                    $name = $cat['name'];
                                    echo "<option value='$slug'>$name</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <input type="text" maxlength="100" name="tags" class="text" placeholder="Enter Tags by Comma (,) Separated (Optional) ">
                        <p style="font-size: 12px">Ex:- Funny, Jokes, City, State (Up to 100 Words)</p>

                    </div>
                    <div class="text2">
                        <textarea name="details" maxlength="1000" placeholder="Enter Group Information and Rules (Optional)"></textarea>
                        <p style="font-size: 12px;margin-bottom: 10px">Description length (Up to 1000 Words)</p>
                    </div>
                    <b style="font-size: 14px;margin-bottom: 10px">Note:- Your group is visible to public world
                        wide(Everyone).</b>
                    <span><input type="submit" name="add_group" value="Submit"></span>
                    <div class="clear"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'partials/footer.php';
?>