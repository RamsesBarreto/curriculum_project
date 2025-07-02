document.querySelectorAll(".rating").forEach(function (ratingGroup, groupIdx) {
  const stars = ratingGroup.querySelectorAll(".star");
  // Recuperar rating guardado para este grupo (opcional, usando dataset o id)
  let stored = localStorage.getItem("rating_" + groupIdx);
  if (stored) updateStarRating(stars, stored);

  stars.forEach(function (star, idx) {
    star.addEventListener("click", function () {
      let rating = idx + 1;
      // Guardar rating solo para este grupo
      localStorage.setItem("rating_" + groupIdx, rating);
      updateStarRating(stars, rating);
    });
  });
});

function updateStarRating(stars, rating) {
  stars.forEach((star, i) => {
    star.classList.toggle("checked", i < rating);
  });
}
