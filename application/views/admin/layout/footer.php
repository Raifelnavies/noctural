            
                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Noctural 2024</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="http://localhost/noctural/admin">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- Bootstrap core JavaScript-->
        <script src="http://localhost/template/vendor/jquery/jquery.min.js"></script>
        <script src="http://localhost/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="http://localhost/template/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="http://localhost/template/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="http://localhost/template/vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="http://localhost/template/js/demo/chart-area-demo.js"></script>
        <script src="http://localhost/template/js/demo/chart-pie-demo.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>

        <!-- script untuk 3 day pass -->
        <script>
            document.getElementById('add-tanggal-edit').addEventListener('click', function () {
                var tanggalContainer = document.getElementById('tanggal-container-edit');
                var newInputGroup = document.createElement('div');
                newInputGroup.className = 'input-group mb-2';

                var newInput = document.createElement('input');
                newInput.type = 'date';
                newInput.className = 'form-control';
                newInput.name = 'tanggal_kegiatan[]';
                newInput.required = true;

                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-danger remove-tanggal';
                removeButton.textContent = 'Hapus';
                removeButton.style.marginLeft = '10px';

                newInputGroup.appendChild(newInput);
                newInputGroup.appendChild(removeButton);
                tanggalContainer.appendChild(newInputGroup);

                removeButton.addEventListener('click', function () {
                    tanggalContainer.removeChild(newInputGroup);
                });
            });

            document.querySelectorAll('.remove-tanggal').forEach(function(button) {
                button.addEventListener('click', function () {
                    var tanggalContainer = document.getElementById('tanggal-container-edit');
                    tanggalContainer.removeChild(button.parentElement);
                });
            });
        </script>

        <!-- script untuk dayly pass -->
        <script>
            document.getElementById('add-tanggal').addEventListener('click', function () {
                var tanggalContainer = document.getElementById('tanggal-container');
                var newInputGroup = document.createElement('div');
                newInputGroup.className = 'input-group mb-2';
                
                var newInput = document.createElement('input');
                newInput.type = 'date';
                newInput.className = 'form-control';
                newInput.name = 'tanggal_kegiatan[]';
                newInput.required = true;

                var removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'btn btn-danger remove-tanggal';
                removeButton.textContent = 'Hapus';
                removeButton.style.marginLeft = '10px';

                newInputGroup.appendChild(newInput);
                newInputGroup.appendChild(removeButton);
                tanggalContainer.appendChild(newInputGroup);

                removeButton.addEventListener('click', function () {
                    tanggalContainer.removeChild(newInputGroup);
                });
            });

            document.querySelectorAll('.remove-tanggal').forEach(function(button) {
                button.addEventListener('click', function () {
                    var tanggalContainer = document.getElementById('tanggal-container');
                    tanggalContainer.removeChild(button.parentElement);
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $('#dataTable').DataTable();
            });
        </script>
        <script src="cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    </body>

</html>