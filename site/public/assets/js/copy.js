document.querySelector('button').addEventListener('click', e => {
    var inp = document.createElement('input')
    inp.value = "Hi! I'm copied by button"
    document.body.appendChild(inp)
    inp.select()
    
    if (document.execCommand('copy')) {
      console.log("Done!")
    } else {
      console.log("Failed...")
    }
    
    document.body.removeChild(inp)
  })