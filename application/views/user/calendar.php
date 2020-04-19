<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="row">
        <div class="col-lg">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary add_calendar mb-3" data-toggle="modal" data-target="#create_modal">
                <i class="fa fa-plus"></i>
                Add New Event
            </button>

            <div id="calendarIO"></div>

            <!-- Modal -->
            <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Add Event</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="POST" id="form_create">
                                <div class="alert alert-danger" style="display: none;"></div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input type="hidden" name="calendar_id" class="form-control" value=0>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Title <span class="required"> * </span></label>
                                    <div class="col-sm-10">
                                        <input type="text" name="title" class="form-control" placeholder="Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" rows="3" class="form-control" placeholder="Enter Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Color</label>
                                    <div class="col-sm-10">
                                        <select name="color" class="form-control">
                                            <option value="">Choose</option>
                                            <option style="color:#0071c5;" value="#0071c5">&#9724; Dark blue</option>
                                            <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquoise</option>
                                            <option style="color:#008000;" value="#008000">&#9724; Green</option>
                                            <option style="color:#FFD700;" value="#FFD700">&#9724; Yellow</option>
                                            <option style="color:#FF8C00;" value="#FF8C00">&#9724; Orange</option>
                                            <option style="color:#FF0000;" value="#FF0000">&#9724; Red</option>
                                            <option style="color:#000000;" value="#000">&#9724; Black</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Start Date</label>
                                    <div class="col-sm-10 input-group mb-3 date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years" data-provide="datepicker-inline">
                                        <input type="text" name="start_date" class="form-control" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar font-dark"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">End Date</label>
                                    <div class="col-sm-10 input-group mb-3 date date-picker" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                        <input type="text" name="end_date" class="form-control" readonly>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fa fa-calendar font-dark"></i></span>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <a href="javascript::void" class="btn btn-secondary" data-dismiss="modal">Cancel</a>
                            <a class="btn btn-danger delete_calendar" style="display:none;">Delete</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->