<?php
/**
 * @Created by          : Waris Agung Widodo (ido.alit@gmail.com)
 * @Date                : 2019-01-30 00:58
 * @File name           : detail_template.php
 */

?>

<div class="container">
    <div class="flex flex-wrap row">
        <div class="w-64 mb col-12 col-md-6">
            <div class="bg-light p-12 d-flex flex-row justify-content-center">
                <div class="">
                  <?= $image; ?>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center text-sm my-2">
                <a href="#" data-id="<?= $biblio_id ?>" data-detail="true" class="bookMarkBook text-decoration-none <?= $setBookmarked ?> font-weight-bolder mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-postcard-heart" viewBox="0 0 16 16">
                        <path d="M8 4.5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7Zm3.5.878c1.482-1.42 4.795 1.392 0 4.622-4.795-3.23-1.482-6.043 0-4.622ZM2.5 5a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3Zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3Zm0 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3Z"/>
                        <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H2Z"/>
                    </svg>
                    <?= in_array($biblio_id, $_SESSION['bookmark']??[]) ? __('Bookmarked') : __('Bookmark') ?>
                </a>
                <a href="javascript:void(0)" data-toggle="modal" data-id="<?= $biblio_id ?>" data-title="<?= $title ?>" data-target="#mediaSocialModal" class="text-decoration-none text-secondary font-weight-bolder mr-3 px-2 py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
                        <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                    </svg>
                    <?= __('Share') ?>
                </a>
            </div>
        </div>
        <div class="flex-1 p-0 px-md-4 col-md-12 col-12">
            <p class="lead"><i class="fas fa-bookmark text-green"></i> <?= $gmd_name; ?></p>
            <blockquote class="blockquote">
                <h4 class="mb-2"><?= $title; ?></h4>
                <footer class="blockquote-footer"><?= str_replace("<br />", '; ', $authors); ?></footer>
            </blockquote>
            <hr>
            <p class="text-grey-darker">
              <?= $notes ? $notes : '<i>'.__('Description Not Available').'</i>'; ?>
            </p>
            <hr>
            <h5 class="mt-4 mb-1"><?= __('Availability'); ?></h5>
            <?= ($availability) ? $availability : '<p class="text-success">' . "Tersedia" . '</p>'; ?>
            <h5 class="mt-4 mb-1"><?= __('Detail Information'); ?></h5>
            <!-- table -->
            <table class="table table-hover">                
             <dl class="row">
                <tbody>
                    <tr>
                        <th scope="row">
                            <dt class=""><?= __('Series Title'); ?></dt>
                        </th>
                        <td>
                            <dd class="">
                            <div itemprop="alternativeHeadline"
                                property="alternativeHeadline"><?php echo ($series_title) ? $series_title : '-'; ?></div>
                            </dd>  
                        </td>                    
                    </tr>
                    <tr>
                        <th scope="row">
                            <dt class=""><?= __('Publisher'); ?></dt>
                        </th>
                        <td>
                            <dd class="">
                                <span itemprop="publisher" property="publisher" itemtype="http://schema.org/Organization"
                                    itemscope><?php echo $publish_place ?></span> -
                                <span itemprop="publisher" property="publisher"><?php echo $publisher_name ?></span>
                                <span itemprop="datePublished" property="datePublished"><?php echo $publish_year ?></span>
                            </dd>
                        </td>                    
                    </tr>
                    <tr>
                        <th scope="row">
                            <dt class=""><?= __('Collation'); ?></dt>
                        </th>
                        <td>
                            <dd class="">
                                <div itemprop="numberOfPages"
                                    property="numberOfPages"><?php echo ($collation) ? $collation : '-'; ?></div>
                            </dd>
                        </td>                    
                    </tr>
                    <tr>
                        <th scope="row">
                            <dt class=""><?= __('Language'); ?></dt>
                        </th>
                        <td>
                            <dd class="">
                                <div>
                                    <meta itemprop="inLanguage" property="inLanguage"
                                        content="<?php echo $language_name ?>"/><?php echo $language_name ?></div>
                            </dd>
                        </td>                    
                    </tr>
                    <tr>
                        <th scope="row">
                            <dt class=""><?= __('ISBN/ISSN'); ?></dt>
                        </th>
                        <td>
                            <dd class="">
                                <div itemprop="isbn" property="isbn"><?php echo ($isbn_issn) ? $isbn_issn : '-'; ?></div>
                            </dd>
                        </td>                    
                    </tr>
                    <tr>
                        <th scope="row">
                            <dt class=""><?= __('Classification'); ?></dt>
                        </th>
                        <td>
                            <dd class="">
                                <div><?php echo ($classification) ? $classification : '-'; ?></div>
                            </dd>
                        </td>                    
                    </tr>
                    <tr>
                        <th scope="row">
                            <dt class=""><?= __('Edition'); ?></dt>
                        </th>
                        <td>
                            <dd class="">
                                <div itemprop="bookEdition" property="bookEdition"><?php echo ($edition) ? $edition : '-'; ?></div>
                            </dd>
                        </td>                    
                    </tr>                    
                </tbody>
            </table>
             <!-- End Table -->        
          <?php if (count($biblio_custom) > 0) {
            ; ?>
              <h5 class="mt-4 mb-1"><?= __('Other Information'); ?></h5>
              <dl class="row">
                <?php foreach ($biblio_custom as $item) { ?>
                    <dt class="col-sm-3"><?= $item['label']; ?></dt>
                    <dd class="col-sm-9">
                        <div itemprop="alternativeHeadline"
                             property="alternativeHeadline"><?php echo ($item['value']) ? $item['value'] : '-'; ?></div>
                    </dd>
                <?php }; ?>
              </dl>
          <?php }; ?>

            <h5 class="mt-4 mb-1"><?= __('Other version/related'); ?></h5>
            <div>
              <?php echo ($related) ? $related : '<p class="text-grey-dark">' . __('No other version available') . '</p>'; ?>
            </div>

            <h5 id="attachment" class="mt-4 mb-1"><?= "Baca buku"; ?></h5>
            <div itemprop="associatedMedia">
              <?= !$file_att ? '<i>'.__('No Data').'</i>' : $file_att ; ?>
            </div>

            <h5 id="comment" class="mt-4 mb-1"><?= __('Comments'); ?></h5>
          <?php echo showComment($biblio_id); ?>
          <?php if(!isset($_SESSION['mid']) && $sysconf['comment']['enable']) : ?>
              <hr>
              <a href="index.php?p=member" class="btn btn-outline-primary"><?= __('You must be logged in to post a comment'); ?></a>
          <?php endif; ?>
        </div>
    </div>
</div>
