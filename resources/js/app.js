require('./bootstrap');
import swal from 'sweetalert2'

window.deleteConfirm = function(formId){
    console.log(formId)
    swal.fire({
        title: 'Êtes vous sûr de vouloir effectuer cette action?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: `Supprimer`,
        denyButtonText: `Annuler`,
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          //Swal.fire('Saved!', '', 'success')
            console.log(formId);
            document.getElementById(formId).submit();
        } /*else if (result.isDenied) {
          Swal.fire('Suppression annulée', '', 'info')
        }*/
      })
}

