$(function(){ // on dom ready

var cy = cytoscape({
  
  container: document.getElementById('cy'),
  
  elements: {
    nodes: [
      { data: { id: 'n', label: 'Tap me' } }
    ]
  },
  
  layout: {
    name: 'grid',
    padding: 100
  },
  
  ready: function(){
    window.cy = this;
  },
  
  style: 'node { content: data(label); }'
});

// you can use qtip's regular options
// see http://qtip2.com/
cy.$('#n').qtip({
  content: 'Hello!',
  style: {
    classes: 'qtip-bootstrap',
    tip: {
      width: 16,
      height: 8
    }
  }
});
  
}); // on dom ready