// Associe une action au chargement de la page
document.addEventListener('DOMContentLoaded', function () {
  // Pour chaque élément contenant un champ texte suivi d'un bouton "copier vers le presse-papier"
  copyToClipboardElements = document.getElementsByClassName('copy-to-clipboard');
  for (let element of copyToClipboardElements) {
    // Récupère le champ texte
    const inputElement = element.querySelector('input');
    // Récupère le bouton
    const buttonElement = element.querySelector('button');

    // Associe une action au fait de cliquer sur le bouton
    buttonElement.addEventListener('click', function () {
      // Sélectionne le champ texte
      inputElement.select();
      // Effectue une action "copier vers le presse-papier"
      document.execCommand('copy');
    });
  }
});
