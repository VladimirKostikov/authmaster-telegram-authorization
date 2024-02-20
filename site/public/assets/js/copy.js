function copy(code, notification) {
  navigator.clipboard.writeText(code).then(() => {
    alert(notification);
  },() => {
    alert('Failed to copy');
  });
}