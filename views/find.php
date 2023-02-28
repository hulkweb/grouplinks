<?php
$title = 'Grouplor - Get different links from one source';

include 'partials/header.php';

?>
<!---start-content---->


<div class="content">
    <div class="wrap">
        <div id="main" role="main">

            <div style="margin-bottom: 10px;text-align: center">
                <form method="post" action="find.php">
                    <select name="category" id="" class="selectbtn">
                        <option value=''>Any Category</option>
                        <?php $cats = get_categories($pdo);
                        foreach ($cats as $cat) {
                            $id = $cat['id'];
                            $name = $cat['name'];
                            echo "<option value='$id'>$name</option>";
                        }
                        ?>
                    </select>
                    <select name="country" id="" class="selectbtn">
                        <option value=''>Any Country</option>
                        <?php $cats = get_countries($pdo);
                        foreach ($cats as $cat) {
                            $id = $cat['id'];
                            $name = $cat['name'];
                            echo "<option value='$id'>$name</option>";
                        }
                        ?>
                    </select>
                    <select name="language" id="" class="selectbtn">
                        <option value=''>Any Language</option>
                        <?php $cats = get_languages($pdo);
                        foreach ($cats as $cat) {
                            $id = $cat['id'];
                            $name = $cat['name'];
                            echo "<option value='$id'>$name</option>";
                        }
                        ?>
                    </select>
                    <input type="submit" class="serbtn" value="Find group">
                </form>
            </div>




            <!-- These are our grid blocks -->

            <!-- <div id="results"></div> -->

            <!-- <div id="report" style="display: none"><img src="./assets/images/loader.gif" style="height: 40px;margin-top: 10px"></div> -->
            <!-- <div style="margin-top: 10px">
                <a class="addbtn" name="load_more" id="load_more" style="cursor: pointer;">Load more group</a>
            </div>
            <div id="no" style="display: none;color: #555">No More groups</div>

            <div style="padding-top: 50px"></div> -->
            <?php
            foreach ($groups as $group) { ?>

                <div class="maindiv">
                    <div> <a style="color: #5a5a5a" target="_blank" href="<?= $url?>invite/<?= $group['link'] ?>" title="Whatsapp group invite link: <?= $group['name'] ?>"><span><img src="../pps.whatsapp.net/v/t61.24694-24/328704993_216192720809513_7739274909789861998_ndd44.jpg?ccb=11-4&amp;oh=01_AdQWgC-MpJyi3EdVeJivyjPGYsQV0k9_vzl6JISF_-SROw&amp;oe=6407196F" class="image" onerror="imgError(this);" alt="<?= $group['name'] ?>"></span></a>
                        <a target="_blank" href="<?= $url?>invite/<?= $group['link'] ?>" title="Whatsapp group invite link: <?= $group['name'] ?>"><span class="gtitle"><?= $group['name'] ?></span></a>
                    </div>
                    <div class="post-info">
                        <div class="post-basic-info">
                            <span>
                                <img src="<?= $url?>assets/images/category.png" class="icon">
                                <a href="<?= $url?>category/<?= $group['category']['slug'] ?>" title="<?= $group['category']['name'] ?>WhatsaApp groups invite link"><?= $group['category']['name'] ?></a>
                            </span>
                            <span>
                                <img src="<?= $url?>assets/images/country.png" class="icon">
                                <a href="<?= $url?>group/country/<?= $group['country']['slug'] ?>" title="<?= $group['country']['name'] ?> Whatsapp group link"> <?= $group['country']['name'] ?> </a></span>
                            <span>
                                <img src="<?= $url?>assets/images/language.png" class="icon">
                                <a href="<?= $url?>group/language/<?= $group['language']['slug'] ?>" title="<?= $group['language']['name'] ?> Whatsapp group join links"><?= $group['language']['name'] ?> </a></span>
                            <p class="descri" style="margin-bottom: 0px"><?= $group['details'] ?></p>
                            <div style="margin-bottom: 5px;">
                                <?php foreach (explode(",", $group['tags']) as $tag) { ?>
                                    <a class="innertag" href="#" title=" Massage Whatsapp group invite link"><?= $tag ?></a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="post-info-rate-share"> <span class="joinbtn"><a class="joinbtn" href="<?= $url?>join/<?= $group['link'] ?>" target="_blank" title="Click here to join <?= $group['name'] ?> Whatsapp group" rel="nofollow">Join
                                    group</a></span>
                            <div class="post-share">
                                <div>

                                    <a class="joinbtn" style="vertical-align:top" href="whatsapp://send?text=Follow this link to Join my Whatsapp group : <?= $url ?>group/invite/<?= $group['link'] ?> %0A %0AFind more WhatsApp Group at: <?= $url ?> " data-action="share/whatsapp/share" rel="nofollow">Share on</a>
                                    <a href="whatsapp://send?text=Follow this link to Join my Whatsapp group : <?= $url ?>group/invite/<?= $group['link'] ?>" data-action="share/whatsapp/share">
                                        <img src="<?= $url?>assets/images/whatsapp.png" width="24" height="24" alt="Share on Whatsapp" title="Share on Whatsapp" rel="nofollow" /></a>

                                    <a href="https://twitter.com/intent/tweet?text=Follow%20this%20link%20to%20Join%20my%20Whatsapp%20group%20:%20&amp;url=<?= $url ?>group/invite/<?= $group['link'] ?>" target="_blank" rel="nofollow">
                                        <img src="<?= $url?>assets/images/twitter.jpg" width="24" height="24" alt="Share on Twitter" title="Share on Twitter" /></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- </div> -->

            <!-- End of grid blocks -->
        </div>
    </div>
</div>

<script src="././assets/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        var total_record = 0;

        //var total_groups = ;
        $('#results').load("group/indexmore.html", {
            'group_no': total_record
        }, function() {
            total_record++;
        });

        $(document).on('click', '#load_more', function() {
            $("#load_more").hide();
            //if (total_record <= total_groups)
            //{
            loading = true;
            $("#report").show();
            $.post('group/indexmore.html', {
                    'group_no': total_record
                },
                function(data) {
                    if (data !== "") {
                        $("#results").append(data);
                        $("#report").hide();
                        $("#load_more").show();
                        total_record++;
                    } else {
                        $("#report").hide();
                        $("#no").show();
                        $("#load_more").hide();
                    }
                });
            //}


        });
    });
</script>

<?php include 'partials/footer.php';
?>