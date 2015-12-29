<script>
  $(function() {
    var availableTags = [
      "Bangalore",
      "Mysore",
      "Mandya"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  });
</script>