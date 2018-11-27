<?php $panel='dashboard'; include "admin_frame.php"; ?>

    <!-- Display the status message -->

<?php
if($this->session->flashdata('msg')) {
    echo $this->session->flashdata('msg');
}
?>
    <div class="col-md-9">
        <div class="card">
            <div class="card">
                <h4 class="card-header">Website Overview</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card bg-light card-body dash-box">
                                <h4><i class="fas fa-feather"></i><?php echo $article_count?></h4>
                                <p>Articles</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light card-body dash-box">
                                <h4><i class="fas fa-paper-plane"></i><?php echo $post_count?></h4>
                                <p>Forum Posts</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light card-body dash-box">
                                <h4><i class="fas fa-book"></i> <?php echo $article_count?></h4>
                                <p>Enquiries</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h4 class="card-header">Recent Users</h4>
            <div class="card-body">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include "footer.php"; ?>