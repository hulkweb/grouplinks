<?php
$title = 'Grouplor - Get different links from one source';

include 'partials/header.php';

?>
<div class="content">
    <div class="wrap">
        <div class="contact-info">
            <div style="margin-top: 30px; margin-bottom: 30px;text-align: center">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8334304936230852" crossorigin="anonymous"></script>
                <!-- Disp 20-2-22 -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8334304936230852" data-ad-slot="9350697636" data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
            <div style="text-align: center">
                <div style=" float: right; width: 32px; ">


                </div>

                <div>
                    <img class="proimg" src="<?= $group['image'] ?>" onerror="imgError(this);" />
                </div>


                <div>
                    <b style="font-size: 22px;word-wrap: normal">
                        <?= $group['name'] ?> </b>
                </div>
                <div>
                    <img src="<?= $url ?>assets/images/category.png" class="icon">
                    <a class="cate" href="<?= $url ?>group/category/<?= $group['category']['slug'] ?>"><?= $group['category']['name'] ?></a>
                    <img src="<?= $url ?>assets/images/country.png" class="icon">
                    <a class="cate" href="<?= $url ?>group/country/<?= $group['country']['slug'] ?>"><?= $group['country']['name'] ?></a>
                    <img src="<?= $url ?>assets/images/language.png" class="icon">
                    <a class="cate" href="<?= $url ?>group/language/<?= $group['language']['slug'] ?>"><?= $group['language']['name'] ?></a>
                </div>

                <div style="height: 30px">
                    <img src="<?= $url ?>assets/images/date.png" class="icon"><span class="cate">
                        <?= $group['created_at'] ?></span>
                </div>

                <pre class="predesc"><?= $group['details'] ?></pre>



                <!-- <div style="margin-bottom: 20px">
                    <a class="innertag" href="<?= $url ?>group/tags/Beauty-health-fitness" title="Beauty/ health / fitness  groups">Beauty/ health / fitness </a>
                </div> -->


                <div style="margin-top: 30px; margin-bottom: 30px;text-align:center;">
                    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8334304936230852" crossorigin="anonymous"></script>
                    <!-- Disp 20-2-22 -->
                    <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8334304936230852" data-ad-slot="9350697636" data-ad-format="auto" data-full-width-responsive="true"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
                <div>
                    <a href="<?= $url ?>group/join/<?= $group['link'] ?>" target="_blank" class="btn" rel="nofollow">Join group</a>
                    <a class="btn" href="whatsapp://send?text=Follow this link to Join my Whatsapp group : <?= $url ?>group/invite/<?= $group['link'] ?> %0A %0AFind more WhatsApp Group at: <?= $url ?> " data-action="share/whatsapp/share" rel='nofollow'>Share group</a>
                </div>

                <div style="padding-top: 15px">
                    <a href="whatsapp://send?text=Follow this link to Join my Whatsapp group : <?= $url ?>group/invite/<?= $group['link'] ?> %0A %0AFind more WhatsApp Group at: <?= $url ?> " data-action="share/whatsapp/share" rel='nofollow'>
                        <img src='<?= $url ?>assets/images/whatsapp.png' width='32' height='32' alt="Share on Whatsapp" title="Share on Whatsapp" rel='nofollow' /></a>
                    <a href='https://twitter.com/intent/tweet?text=Follow%20this%20link%20to%20Join%20my%20WhatsApp%20group%20:&amp;url=<?= $url ?>group/invite/<?= $group['link'] ?>' target='_blank' rel='nofollow'>
                        <img src='<?= $url ?>assets/images/twitter.jpg' width='32' height='32' alt="Share on Twitter" title="Share on Twitter" /></a>
                </div>
                <br>
            </div>






            <!---start-comments-section--->
            <div class="comment-section">
                <div class="grids_of_2">
                    <div class="artical-commentbox">
                        <b id="show" style="font-size: 14px;color: #8C8C8C">* Report this group </b><b id="hide" style="color: white;border-radius: 50%;background-color: #0BC20B;padding: 0px 5px 1px 5px;font-weight: bolder   ;font-size: 12px;display: none">X</b>
                        <div class="table-form" id="report" style="display: none">
                            <form action="<?= $url ?>addreport" method="post" name="post_comment">

                                <input type="hidden" name="group_id" value="<?= $group['id'] ?>">
                                <input type="hidden" name="link" value="<?= $group['link'] ?>">

                                <div class="text3">
                                    <select name="reason" required>
                                        <option value="">Report for</option>
                                        <option value="Child Pornography">Child Pornography</option>
                                        <option value="Rape/Gang rape">Rape/Gang rape</option>
                                        <option value="Inappropriate">Inappropriate</option>
                                        <option value="Link Revoked">Link Revoked</option>
                                        <option value="Group is Full">Group is Full</option>
                                        <option value="Group in Wrong Category">Group in Wrong Category</option>
                                        <option value="Remove my Group">Remove my Group</option>
                                        <option value="Religious Hateful">Religious Hateful</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="text2">
                                    <textarea name="message" maxlength="500" placeholder="Your Comment (Required)" required></textarea>
                                </div>

                                <input style="width: 10px;border: 0px none;text-align: left;background: none;
                                       float: left;
                                       color: inherit;
                                       border: none;
                                       padding: 0;
                                       font: inherit;
                                       cursor: pointer;
                                       outline: inherit; " type="text" name="val1" value="9" readonly>
                                <span style="float: left"> + </span>
                                <input style="width: 10px;border: 0px none;text-align: right;background: none;
                                       float: left;
                                       color: inherit;
                                       border: none;
                                       padding: 0;
                                       font: inherit;
                                       cursor: pointer;
                                       outline: inherit;" type="text" name="val2" value="9" readonly>
                                <span style="float: left"> = </span>
                                <input style="width: 25px;padding: 3px;margin: 5px;border: 1px solid black" type="text" name="val3" class="text" required>


                                <script>
                                    function countDown(secs, elem) {
                                        var element = document.getElementById(elem);
                                        element.innerHTML = "Wait " + secs + " seconds to submit another report";
                                        if (secs < 1) {
                                            clearTimeout(timer);
                                            element.innerHTML = '';
                                            document.getElementById("sub").style.display = "";
                                        }
                                        secs--;
                                        var timer = setTimeout('countDown(' + secs + ',"' + elem + '")', 1000);
                                    }
                                </script>

                                <div id="status"></div>

                                <input type="submit" value="submit" id="sub">




                            </form>
                        </div>
                        <div class="clear"> </div>
                    </div>
                </div>
            </div>



            <!-- End of grid blocks -->

            <!---//End-comments-section--->
        </div>
        <!-- These are our grid blocks -->
        <h1 style="font: 400 30px/28px 'Open Sans', sans-serif;
            color: #363636;
            text-align: left;
            padding: 1em 0 0.5em">Relate Groups</h1>
        <div id="results"></div>

        <div id="loder" style="display: none"><img src="<?= $url ?>assets/images/loader.gif" style="height: 40px;margin-top: 10px"></div>
        <div style="margin-top: 10px">
            <a class="addbtn" name="load_more" id="load_more" style="cursor: pointer;">Load more group</a>
        </div>
        <div id="no" style="display: none;color: #555">No More groups</div>
        <div style="padding-top: 50px"></div>

    </div>
</div>
<script>
    $(document).ready(function() {
        $("#hide").click(function() {
            $("#report").hide();
            $("#hide").hide();
        });
        $("#show").click(function() {
            $("#report").show();
            $("#hide").show();
        });
    });
</script>
<?php include 'partials/footer.php';

?>