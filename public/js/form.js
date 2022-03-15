
new TomSelect("#serie_lesGenres", {
    plugins: ['remove_button'],
    create: true,
    onItemAdd: function() {
      this.setTextboxValue('');
      this.refreshOptions();
    },
    render: {
      option: function(data, escape) {
        return '<div class="d-flex"><span>' + escape(data.text) + '</span><span class="ms-auto text-muted">' + escape(data.value) + '</span></div>';
      },
      item: function(data, escape) {
        return '<div>' + escape(data.text) + '</div>';
      }
    }
  });