<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-primary">
                    <div class="card-body">
                        <div>
                            <div class="btn-group w-100 mb-2">
                                <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> ห้องทั้งหมด </a>
                                <a class="btn btn-info" href="javascript:void(0)" data-filter="1">ห้องว่าง </a>
                                <a class="btn btn-info" href="javascript:void(0)" data-filter="2">ห้องไม่ว่าง </a>

                            </div>

                        </div>
                        <div>
                            <div class="filter-container p-0 row" style="padding: 3px; position: relative; width: 100%; display: flex; flex-wrap: wrap; height: 3711px;">
                                <?php
                                $sql = "SELECT * FROM tb_room ";
                                $query = $conn->query($sql);
                                while ($row = mysqli_fetch_array($query)) {
                                    $room_number = $row['room_number'];
                                    $room_id  = $row['room_id'];
                                    $room_status =  $row['room_status'];
                                    $room_floor =  $row['room_floor'];
                                ?>

                                    <?php if ($room_status == 'ห้องว่าง') { ?>
                                        <div class="filtr-item col-sm-2" data-category="0,1" data-sort="white sample" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 313px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                            <img data-target="#exampleModalCenter<?php echo $room_id ?>" src="https://via.placeholder.com/300/74E000/000000?text=<?php echo $room_number ?>" class="img-fluid mb-2" alt="white sample">
                                        </div>
                                    <?php } else if ($room_status == 'ห้องไม่ว่าง') { ?>
                                        <div class="filtr-item col-sm-2" data-category="0,2,4" data-sort="white sample" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 313px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                            <img id="<?php echo $room_id ?>" data-target="#exampleModalCenter<?php echo $room_id ?>" src="https://via.placeholder.com/300/FF0000/000000?text=<?php echo $room_number ?>" class="img-fluid mb-2" alt="white sample">
                                        </div>

                                    <?php } else  if ($room_status == 'ห้องชำรุด') { ?>
                                        <div class="filtr-item col-sm-2" data-category="0,2,4" data-sort="white sample" style="opacity: 1; transform: scale(1) translate3d(0px, 0px, 0px); backface-visibility: hidden; perspective: 1000px; transform-style: preserve-3d; position: absolute; width: 313px; transition: all 0.5s ease-out 0ms, width 1ms ease 0s;">
                                            <img id="<?php echo $room_id ?>" data-target="#exampleModalCenter<?php echo $room_id ?>" src="https://via.placeholder.com/300/FF0000/000000?text=<?php echo $room_number ?>" class="img-fluid mb-2" alt="white sample">
                                        </div>

                                    <?php } ?>





                                <?php } ?>
                            </div>

                        </div>
                        <!-- END Modal Room -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>