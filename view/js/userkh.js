
const input_check_pass = document.querySelectorAll('.input_check_pass');
const input_pass = document.querySelectorAll('.input_pass');

input_check_pass.forEach(btn => {
  btn.addEventListener('click', () => {
    const target2 = btn.dataset.pass_see;
    input_pass.forEach(query => {
      if (query.id === target2) {
        if (query.type === 'password') {
          query.type = 'text';
        } else {
          query.type = 'password';
        }
      } else {
        return false;
      }
    });
  });
});
