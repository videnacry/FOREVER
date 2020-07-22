<main>
    <!-- General wall -->
    <div class="container my-3">
        <div class="row mx-auto">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 p-0">
                <!-- Existing posts -->
                <div class="post-wrapper">
                    
                    <?php
                    '<div class="post-wrapper shadow mb-3">
                        <!-- Initial post -->
                        <div class="border border-secondary p-3">
                            <img src="https://cdn.pixabay.com/photo/2014/09/11/18/23/london-441853_1280.jpg" alt=""
                                class="img-fluid border border-secondary">
                            <div class="post-content-container p-3 mt-3 border border-secondary">
                                <div class="row mx-auto">
                                    <div class="float-left p-0 mr-3">
                                        <div class="img-cont rounded-circle border border-light" id="img-1"></div>
                                    </div>
                                    <div class="my-auto text-left">
                                        <p class="m-0 font-weight-bold text-capitalize name-box">
                                            anna katarzyna emmerich
                                        </p>
                                        <p class="m-0">
                                            <small>April 23rd, 2020</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mx-auto mt-3">
                                    <p class="m-0 text-justify">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus eius illo
                                        expedita vel
                                        distinctio. Possimus, officia repellendus totam omnis praesentium eos quae illo
                                        reiciendis, sit,
                                        recusandae provident voluptas veniam? Numquam.
                                    </p>
                                </div>
                            </div>
                            <div class="row mt-2 px-3 justify-content-end">
                                <div class="num-likes mx-1">
                                    <p class="m-0 d-inline">25</p>
                                    <i class="far fa-heart"></i>
                                    <!-- <i class="fas fa-heart"></i> -->
                                </div>
                                <div class="num-comments mx-1">
                                    <p class="m-0 d-inline">4</p>
                                    <i class="far fa-comment-alt" data-postid="0"></i>
                                    <!-- <i class="fas fa-comment-alt"></i> -->
                                </div>
                            </div>
                        </div>
                        <!-- New comment -->
                        <div class="border-left border-right border-bottom border-secondary p-3 d-none" id="new-comment-cont">
                            <div class="row mx-0">
                                <!-- <div contenteditable="true" data-placeholder="Write a comment..." class="border border-secondary p-3 rounded w-100 text-secondary" id="comment-box">
                                    </div> -->
                                <textarea name="" id="" cols="100" rows="3" class="border border-secondary p-3 rounded"
                                    placeholder="Write a comment..."></textarea>
                            </div>
                            <div class="row mx-0 mt-2 d-flex justify-content-end align-items-start">
                                <!-- <div class="buttons-block-1">
                                    <button type="button" class="btn btn-sm btn-outline-primary">GIF</button>
                                    </div> -->
                                <div class="buttons-block-2">
                                    <button type="submit" class="btn btn-primary">Reply</button>
                                </div>
                            </div>
                        </div>
                        <!-- Existing comments (Template) -->
                        <!-- <div class="border-left border-right border-bottom border-secondary p-3">
                            <div class="comment-content-container p-3 border border-secondary">
                                <div class="row mx-auto">
                                    <div class="float-left p-0 mr-3">
                                        <div id="img-2" class="img-cont rounded-circle border border-light"></div>
                                    </div>
                                    <div class="my-auto text-left">
                                        <p class="m-0 font-weight-bold text-capitalize name-box">
                                            john stuart mill
                                        </p>
                                        <p class="m-0">
                                            <small>June 6th, 2020</small>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mx-auto mt-3">
                                    <p class="m-0 text-justify">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus eius illo
                                        expedita vel
                                        distinctio.
                                    </p>
                                </div>
                            </div>
                        </div> -->'
                        ?>
                </div>
                
            </div>
        </div>
        <div class="row">
            <div class="btn btn-primary mx-auto" id="more-posts-btn">Load more</div>
        </div>
    </div>
</main>