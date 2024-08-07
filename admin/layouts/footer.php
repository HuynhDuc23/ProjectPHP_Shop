      <!-- END -->
      </main>
      </div>
      </div>
      <script src="text/javascript">
        function deleteUser(id) {
          option = confirm('Bạn có chắc chắn muốn xoá tài khoản này không?')
          if (!option) return;
          $.post('form_api.php', {
            id: id,
            action: 'delete',
          }, function(data) {
            location.reload();
          })
        }
      </script>
      </body>

      </html>