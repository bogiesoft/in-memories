<?php
//use app\models\GalleryImagesModel;
?>
<div class="row">
            
            <div class="manage-gallery">
                <a class="btn btn-success" href="/gallery/manage/" role="button">สร้าง Gallery</a><br><br>
                จักการ Gallery :
                <?php
                foreach ($gallery as $value) { ?>
                <a class="btn btn-info" href="/gallery/manage/<?= $value->id ?>" role="button"><?= $value->name ?></a>
                <?php } ?>
            </div>
        </div>
        
        
<?php /*
        <!-- Filter Controls - Multifilter Mode -->
        <div class="row">
            <!-- A basic setup of multifilter controls, when the user toggles a category
            the corresponding items are rendered or hidden -->
            <ul class="multifilter">
                Multifilter controls:
                <li data-multifilter="1">Cityscape</li>
                <li data-multifilter="2">Landscape</li>
                <li data-multifilter="3">Industrial</li>
            </ul>
        </div>

        <!-- Shuffle & Sort Controls -->
        <div class="row">
            <ul class="sortandshuffle">
                Sort &amp; Shuffle controls:
                <!-- Basic shuffle control -->
                <li class="shuffle-btn" data-shuffle>Shuffle</li>
                <!-- Basic sort controls consisting of asc/desc button and a select -->
                <li class="sort-btn active" data-sortAsc>Asc</li>
                <li class="sort-btn" data-sortDesc>Desc</li>
                <select data-sortOrder>
                    <option value="domIndex">
                        Position
                    </option>
                    <option value="sortData">
                        Description
                    </option>
                </select>
            </ul>
        </div>

        <!-- Search control -->
        <div class="row search-row">
            Search control:
            <input type="text" class="filtr-search" name="filtr-search" data-search>
        </div>
 * 
 */ ?>