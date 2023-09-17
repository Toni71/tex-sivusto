
// kuva tarkistus

const images = document.querySelectorAll('img');

images.forEach(img => {
  img.addEventListener('error', function handleError() {
    const defaultImage =
      'https://geronimo.okol.org/~koiton/tex/css/images/kuva_tulossa.jpg';

    img.src = defaultImage;
    img.alt = 'default';
  });
});





// Checkbox tarkistus

document.addEventListener('DOMContentLoaded', () => {
  const checkboxes = document.querySelectorAll('.cover-checkboxs');

  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', async (event) => {
      const coverId = checkbox.getAttribute('data-cover-id');
      const status = checkbox.checked ? 1 : 0;

      const response = await fetch('post/update_cover_status.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ coverId, status }),
      });

      const data = await response.json();
      if (data.success) {
        console.log('Kannen omistustila päivitetty onnistuneesti');

        // Päivitä checkboxin tila vastauksen perusteella
        if (status === 1) {
          checkbox.checked = true;
        } else {
          checkbox.checked = false;
        }
      }
    });
  });
});

