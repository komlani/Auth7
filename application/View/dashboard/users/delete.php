<div class="right_col">

    <div class="row">

        <div class="x_panel">

            <div class="x_content">

                <div class="row">
                    <div class="col-sm-12 text-left p-3 m-2">
                        <a href="<?php echo URL ?>user" class="btn btn-sm btn-primary">
                            <i class="fa fa-list" aria-hidden="true"></i> Return To List
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <form action="<?php echo URL ?>user/destroy" method="post">
                            <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?? '' ?>">
                            <input type="hidden" name="_token" value="<?php echo $_SESSION['????id'] ?? '' ?>">
                            Delete ?

                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>