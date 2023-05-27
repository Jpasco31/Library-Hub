
function scrollToBookPage() {
    const bookPageElement = document.getElementById('bookpage');
    if (bookPageElement) {
        bookPageElement.scrollIntoView({ behavior: 'smooth' });
    }
}

function myFunction() {
    alert("Not admin");
  }

  function toggleSynopsis(bookId) {
    var synopsisElement = document.getElementById("synopsis-" + bookId);
    if (synopsisElement.style.display === "none") {
        synopsisElement.style.display = "block";
    } else {
        synopsisElement.style.display = "none";
    }
}

function openSynopsisModal(bookId) {
    var modalElement = document.getElementById("modal-" + bookId);
    var modal = new bootstrap.Modal(modalElement);
    modal.show();
}

function validateBorrowDate() {
    var borrowButton = document.getElementsByName("borrowButton")[0];
    var borrowDate = document.getElementById("borrowDate");

    if (borrowButton && borrowButton.clicked && borrowDate && !borrowDate.value) {
        borrowDate.setCustomValidity("Borrow date is required.");
        return false;
    }

    return true;
}
