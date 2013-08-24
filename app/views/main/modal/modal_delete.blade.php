<div class="modal fade" id="modal_delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                   Delete?
                </h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete?
            </div>
            <div class="modal-footer">
                {{ Form::open(array('method'=>'delete','class'=>'form-delete'))}}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Nope</button>
                    <button type="submit" class="btn btn-danger">Yes I want to delete</button>
                {{ Form::close()}}
            
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->