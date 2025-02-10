<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/App/Views/layoutDashboard/header.php"
?>


<div class="page-wrapper">
    <div class="page-content">

        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h6 class="mb-0 text-uppercase">Add Event</h6>
                <hr/>
                <div class="card">
                    <div class="card-body">
                        <!-- Form Start -->
                        <form action="#" method="post" enctype="multipart/form-data">
                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                                <textarea class="form-control summernote" id="content" name="content" aria-label="With textarea"></textarea>
                            </div>

                            <!-- Content (Summernote) -->
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control summernote" id="content" name="content" aria-label="With textarea"></textarea>
                            </div>

                            <!-- Thumbnail Upload -->
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload Thumbnail</label>
                                <input class="form-control" name="thumbnail" type="file" id="formFile">
                            </div>

                            <!-- Localisation -->
                            <div class="mb-3">
                                <label for="localisation" class="form-label">Localisation</label>
                                <input type="text" class="form-control" name="localisation" id="localisation" placeholder="Enter location">
                            </div>

                            <!-- Price -->
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="Enter price">
                            </div>

                            <!-- Capacity -->
                            <div class="mb-3">
                                <label for="capacity" class="form-label">Capacity</label>
                                <input type="number" class="form-control" name="capacity" id="capacity" placeholder="Enter capacity">
                            </div>

                            <!-- Contact Email -->
                            <div class="mb-3">
                                <label for="contactEmail" class="form-label">Contact Email</label>
                                <input type="email" class="form-control" name="contactEmail" id="contactEmail" placeholder="Enter email">
                            </div>

                            <!-- Contact Phone -->
                            <div class="mb-3">
                                <label for="contactPhone" class="form-label">Contact Phone</label>
                                <input type="tel" class="form-control" name="contactPhone" id="contactPhone" placeholder="Enter phone number">
                            </div>

                            <!-- Video Upload -->
                            <div class="mb-3">
                                <label for="formVideo" class="form-label">Upload Video</label>
                                <input class="form-control" name="video" type="file" id="formVideo">
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <!-- Form End -->
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
</div>




        
<?php 
include_once $_SERVER['DOCUMENT_ROOT']."/App/Views/layoutDashboard/footer.php"
?>