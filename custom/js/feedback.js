$(document).ready(function() {
    // Load the feedback data into the table
    loadFeedbackData();
  
    // Handle the edit feedback modal
    $('body').on('click', '.editFeedbackBtn', function() {
      var feedbackId = $(this).data('id');
      $('#editFeedbackModel').modal('show');
      // Load the feedback data into the modal
      getFeedbackData(feedbackId);
    });
  
    // Handle the edit feedback form submission
    $('#editFeedbackForm').on('submit', function(e) {
      e.preventDefault();
      var feedbackId = $(this).data('id');
      var feedbackStatus = $('#editFeedbackStatus').val();
      updateFeedbackStatus(feedbackId, feedbackStatus);
    });
  });
  
  function loadFeedbackData() {
    // AJAX request to fetch feedback data from the server
    // Populate the feedback table with the data
  }
  
  function getFeedbackData(feedbackId) {
    // AJAX request to fetch feedback data for the specified ID
    // Populate the modal with the feedback data
  }
  
  function updateFeedbackStatus(feedbackId, feedbackStatus) {
    // AJAX request to update the feedback status on the server
    // Reload the feedback table or update the status in the table
  }