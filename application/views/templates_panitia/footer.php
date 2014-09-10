                    <!-- modal logout-->
                    <div class="modal fade modal-keluar" tabindex="-1" role="dialog" 
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4> Anda Yakin Ingin Keluar ?</h4>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                                    <a href="<?php echo base_url('panitia/logout') ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!--END MODAL-->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->

    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!--halaman view -->


<footer> 
    <br><br><br><br><br><br><br><hr> 
    <p>&copy; DKM's Research 2014</p>
</footer>

<!-- jQuery Version 1.11.0 -->
<script src="<?php echo base_url('aset/js/vendor/jquery.min.js') ?>"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url('aset/js/vendor/bootstrap.min.js') ?>"></script>

<!-- DataTables JavaScript -->
<script src="<?php echo base_url('aset/js/plugins/dataTables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('aset/js/plugins/dataTables/dataTables.bootstrap.js'); ?>"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url('aset/js/admin.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
</script>

</body>

</html>
