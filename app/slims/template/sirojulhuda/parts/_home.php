<?php
# @Author: Waris Agung Widodo <user>
# @Date:   2018-01-23T11:27:04+07:00
# @Email:  ido.alit@gmail.com
# @Filename: _home.php
# @Last modified by:   user
# @Last modified time: 2018-01-26T18:43:45+07:00

?>

<section id="section1 container-fluid">
    <header class="c-header">
        <div class="mask"></div>
      <?php
      // ------------------------------------------------------------------------
      // include navbar
      // ------------------------------------------------------------------------
      include '_navbar.php'; ?>
    </header>
  <?php
  // --------------------------------------------------------------------------
  // include search form part
  // --------------------------------------------------------------------------
  include '_search-form.php'; ?>
</section>

<section class="">
    <h4 class="text-secondary text-center text-thin mt-5 mb-4"><?php echo "pilih pelajaran yang kamu suka"; ?></h4>
    <ul class="topic d-flex flex-wrap justify-content-center px-0">
        <li class="d-flex justify-content-center align-items-center m-2">
            <a href="index.php?callnumber=qds&search=search" class="d-flex flex-column">
                <img src="<?php echo assets('images/png-qurdits.png'); ?>" width="80" class="mb-3 mx-auto"/>
                <?php echo "AlQuran Hadits"; ?>
            </a>
        </li>
        <li class="d-flex justify-content-center align-items-center m-2">
            <a href="index.php?callnumber=ind&search=search" class="d-flex flex-column">
                <img src="<?php echo assets('images/png-bindo.png'); ?>" width="80" class="mb-3 mx-auto"/>
                <?php echo "Bahasa Indonesia"; ?>
            </a>
        </li>
        <li class="d-flex justify-content-center align-items-center m-2">
            <a href="index.php?callnumber=mtk&search=search" class="d-flex flex-column">
                <img src="<?php echo assets('images/png-mtk.png'); ?>" width="80" class="mb-3 mx-auto"/>
                <?php echo "Matematika"; ?>
            </a>
        </li>
        <li class="d-flex justify-content-center align-items-center m-2">
            <a href="index.php?callnumber=ipa&search=search" class="d-flex flex-column">
                <img src="<?php echo assets('images/png-ipa.png'); ?>" width="80" class="mb-3 mx-auto"/>
                <?php echo "Ilmu Pengetahuan Alam"; ?>
            </a>
        </li>
        <li class="d-flex justify-content-center align-items-center m-2">
            <a href="javascript:void(0)" class="d-flex flex-column" data-toggle="modal" data-target="#exampleModal">
                <img src="<?php echo assets('images/icon/grid_icon.png'); ?>" width="80"
                     class="mb-3 mx-auto"/>
                <?php echo __('see more..'); ?>
            </a>
        </li>
    </ul>
</section>

<?php if ($sysconf['template']['classic_popular_collection']) : ?>
<section class="mt-5 container">
    <h4 class=" mb-4">
        Popular among our collections.
        <br>
        <small class="subtitle-section">Our library's line of collection that have been favoured by our users were shown here. Look for them. Borrow them. Hope you also like them.</small>
    </h4>
    <div class="d-flex flex-wrap">
      <?php
      // ------------------------------------------------------------------------
      // get popular topic
      // ------------------------------------------------------------------------
      $topics = getPopularTopic($dbs);
      foreach ($topics as $topic) {
        echo '<a href="index.php?subject='.$topic.'&search=search" class="btn btn-outline-secondary btn-rounded btn-sm mr-2 mb-2">' . $topic . '</a>';
      }
      ?>
    </div>

    <div class="flex flex-wrap mt-4 collection">
      <?php
      // ------------------------------------------------------------------------
      // get popular title by loan
      // ------------------------------------------------------------------------
      $populars = getPopularBiblio($dbs, $sysconf['template']['classic_popular_collection_item']);
      foreach ($populars as $p) {
        $o = '<div class="w-48 pr-4 pb-4">';
        $o .= '<a href="index.php?p=show_detail&id='.$p['biblio_id'].'" class="card border-0 hover:shadow cursor-pointer text-decoration-none h-full">';
        $o .= '<div class="card-body">';
        $o .= '<div class="card-image fit-height">';
        $o .= '<img src="' . getImagePath($sysconf, $p['image']) . '" class="img-fluid" alt="">';
        $o .= '</div>';
        $o .= '<div class="card-text mt-2 text-grey-darker">';
        $o .= truncate($p['title'], 30);
        $o .= '</div>';
        $o .= '</div>';
        $o .= '</a></div>';
        echo $o;
      }
      ?>
<!--        <div class="card border-0 bg-transparent">-->
<!--            <div class="card-body">-->
<!--                <a href="#" class="d-flex flex-column justify-content-center link-see-more">-->
<!--                    <img src="--><?php //echo assets('images/icon/ios7-arrow-thin-right.png'); ?><!--" width="60%" class="mb-3"/>-->
<!--                    <span>see more.</span>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
    </div>

</section>
<?php endif; ?>

<?php if ($sysconf['template']['classic_new_collection']) : ?>
<section class="mt-5 container bg-white">
        <h4 class="mb-4 text-center">
            <img src="<?php echo assets('images/line1.png'); ?>"class="my-1"/><br>
            <strong class="mt-2 text-dark">REKOMENDASI</strong>
            <br>        
        </h4>
    <div class="d-flex flex-wrap">
      <?php
      // ------------------------------------------------------------------------
      // get latest topic
      // ------------------------------------------------------------------------
      $topics = getLatestTopic($dbs);
      foreach ($topics as $topic) {
        echo '<a href="index.php?subject='.$topic.'&search=search" class="btn btn-outline-secondary btn-rounded btn-sm mr-2 mb-2">' . $topic . '</a>';
      }
      ?>
    </div>

    <div class="flex flex-wrap mt-4 collection">
      <?php
      // ------------------------------------------------------------------------
      // get popular title by loan
      // ------------------------------------------------------------------------
      $latest = getLatestBiblio($dbs, $sysconf['template']['classic_new_collection_item']);
      foreach ($latest as $l) {
        $o = '<div class="w-48 pr-4 pb-4">';
        $o .= '<a href="index.php?p=show_detail&id='.$l['biblio_id'].'"  class="card border-0 hover:shadow cursor-pointer text-decoration-none h-full">';
        $o .= '<div class="card-body">';
        $o .= '<div class="card-image fit-height">';
        $o .= '<img src="' . getImagePath($sysconf, $l['image']) . '" class="img-fluid" alt="">';
        $o .= '</div>';
        $o .= '<div class="card-text mt-2 text-grey-darker">';
        $o .= truncate($l['title'], 30);
        $o .= '</div>';
        $o .= '</div>';
        $o .= '</a></div>';
        echo $o;
      }
      ?>
<!--        <div class="card border-0 bg-transparent">-->
<!--            <div class="card-body">-->
<!--                <a href="#" class="d-flex flex-column justify-content-center link-see-more">-->
<!--                    <img src="--><?php //echo assets('images/icon/ios7-arrow-thin-right.png'); ?><!--" width="60%" class="mb-3"/>-->
<!--                    <span>see more.</span>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
    </div>

</section>
<?php endif; ?>



<?php if ($sysconf['template']['classic_new_collection']) : ?>
<section class="mt-5 container">
    <h4 class=" mb-4">
        New collections + updated.
        <br>
        <small class="subtitle-section">These are new collections list. Hope you like them. Maybe not all of them are new. But in term of time, we make sure that these are fresh from our processing oven.</small>
    </h4>
    <div class="d-flex flex-wrap">
      <?php
      // ------------------------------------------------------------------------
      // get latest topic
      // ------------------------------------------------------------------------
      $topics = getLatestTopic($dbs);
      foreach ($topics as $topic) {
        echo '<a href="index.php?subject='.$topic.'&search=search" class="btn btn-outline-secondary btn-rounded btn-sm mr-2 mb-2">' . $topic . '</a>';
      }
      ?>
    </div>

    <div class="flex flex-wrap mt-4 collection">
      <?php
      // ------------------------------------------------------------------------
      // get popular title by loan
      // ------------------------------------------------------------------------
      $latest = getLatestBiblio($dbs, $sysconf['template']['classic_new_collection_item']);
      foreach ($latest as $l) {
        $o = '<div class="w-48 pr-4 pb-4">';
        $o .= '<a href="index.php?p=show_detail&id='.$l['biblio_id'].'"  class="card border-0 hover:shadow cursor-pointer text-decoration-none h-full">';
        $o .= '<div class="card-body">';
        $o .= '<div class="card-image fit-height">';
        $o .= '<img src="' . getImagePath($sysconf, $l['image']) . '" class="img-fluid" alt="">';
        $o .= '</div>';
        $o .= '<div class="card-text mt-2 text-grey-darker">';
        $o .= truncate($l['title'], 30);
        $o .= '</div>';
        $o .= '</div>';
        $o .= '</a></div>';
        echo $o;
      }
      ?>
<!--        <div class="card border-0 bg-transparent">-->
<!--            <div class="card-body">-->
<!--                <a href="#" class="d-flex flex-column justify-content-center link-see-more">-->
<!--                    <img src="--><?php //echo assets('images/icon/ios7-arrow-thin-right.png'); ?><!--" width="60%" class="mb-3"/>-->
<!--                    <span>see more.</span>-->
<!--                </a>-->
<!--            </div>-->
<!--        </div>-->
    </div>

</section>
<?php endif; ?>


