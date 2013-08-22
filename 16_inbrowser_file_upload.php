<!DOCTYPE html>
<html> 
<head> 
<title>My first Three.js app</title> 
<meta charset="UTF-8">
<style>
body {
   font-family: Monospace;
   font-size: 10pt;
}

input {
  font-family: Monospace;
}

canvas#preview_canvas { 
 position: absolute;
 top: 10px;
 left: 10px;
 width: 512px; 
 height: 768px; 
 border: 1px solid #000000;
}

canvas#bezier_canvas {
position: absolute;
top: 10px;
left: 532px;
width: 512px;
height: 768px;
border: 1px solid #000000;
}

div#mesh_controls {
position: absolute;
top: 10px;
left: 1054px;
width: 400px;
height: 360px;
border: 1px solid #000000;
padding: 10px;
}

div#shape_controls {
position: absolute;
top: 400px;
left: 1054px;
width: 400px;
height: 200px;
border: 1px solid #000000;
padding: 10px;
}

div#stl_builder {
position: absolute;
top: 630px;
left: 1054px;
width: 400px;
height: 100px;
border: 1px solid #000000;
padding: 10px;
}

</style> 

</head> 

<body> 


<canvas id="preview_canvas">
</canvas>


<!-- 
  ATTENTION: THE CANVAS SIZE MUST NOT BE SET USING CSS! 
  OTHERWISE LINES WILL BE DRAWN BLURRY AND UNCLEAR!
  -->
<canvas 
  id="bezier_canvas" 
  width="512px" 
  height="768px">
</canvas>
<div style="position: absolute; left: 532px; top: 788px; width: 256px;">
  <div>
  <form name="bezier_form">
  <input type="checkbox" id="clear_on_repaint" name="clear_on_repaint" checked="checked" onchange="javascript:bezierCanvasHandler.redraw();" />
  <label for="clear_on_repaint">Clear on repaint</label>
  <br/>
  <input type="checkbox" id="draw_tangents" name="draw_tangents" checked="checked" onchange="javascript:bezierCanvasHandler.redraw();" />
  <label for="draw_tangents">Draw tangents</label>
  <br/>
  <input type="checkbox" id="draw_linear_path_segments" name="draw_linear_path_segments" checked="checked" onchange="javascript:bezierCanvasHandler.redraw();" />
  <label for="draw_linear_path_segments">Draw linear path segments</label>
  <br/>
  <input type="checkbox" id="draw_coordinate_system" name="draw_coordinate_system" checked="checked" onchange="javascript:bezierCanvasHandler.redraw();" />
  <label for="draw_coordinate_system">Draw coordinate system</label>
  </form>
  </div>

  <div style="position: absolute; top: 0px; left: 256px; width: 256px; text-align: right;">
  <button onclick="bezierCanvasHandler.decreaseZoomFactor(true);">-</button>
  <button onclick="bezierCanvasHandler.increaseZoomFactor(true);">+</button>
  </div>
</div>



<div id="mesh_controls">
<h3>Mesh controls</h3>
<form name="mesh_form">
<table border="0">

<tr>
  <td><label for="shape_size">Shape size (radius): </label></td>
  <td><input type="number" id="shape_size" name="shape_size" value="100" />px</td>
</tr>

<tr>
  <td><label for="shape_segments">Shape segments: </label></td>
  <td><input type="number" id="shape_segments" name="shape_segments" value="24" /></td>
</tr>

<tr>
  <td><label for="path_length">Path length: </label></td>
  <td><input type="number" id="path_length" name="path_length" value="200" />px</td>
</tr>

<tr>
  <td><label for="path_segments">Path segments: </label></td>
  <td><input type="number" id="path_segments" name="path_segments" value="4" /></td>
</tr>


<tr>
  <td></td>
  <td>
        <input type="checkbox" id="wireframe" name="wireframe" />
          <label for="wireframe">Wireframe</label>
  </td>
</tr>

<tr>
  <td></td>
  <td>
        <input type="checkbox" id="triangulate" name="triangulate" />
        <label for="triangulate">triangulate</label><br/>
        <div style="margin-left: 35px;">*quad faces render faster but only triangulated meshes are STL compatible</div>
      
  </td>
</tr>


<tr>
  <td></label></td>
  <td><input type="button" value="Rebuild" onclick="preview_rebuild_model();"></td>
</tr>

</table>
</form>
</div>

<div id="shape_controls">
  <h3>Shape controls</h3>
  <button onclick="saveTextFile( bezierCanvasHandler.bezierPath.toJSON(), 'bezier_shape.json', 'application/json' );">Export JSON ...</button>
  <br/>
  <h3>Load JSON shape from file</h3>
  <form name="bezier_file_upload_form">
  <input type="file" name="bezier_json_file" />
  <input type="button" value="Upload JSON file ..." onclick="upload_bezier_json_file( document.forms['bezier_file_upload_form'].elements['bezier_json_file'] );">
  </form>
</div>

<div id="stl_builder">
<h3>Export STL</h3>
<form name="stl_form">
  <label for="stl_filename">Filename</label>
  <input type="text" id="stl_filename" name="stl_filename" value="my_exxxtrusion.stl" />
  <input type="button" value="Save STL ..." onclick="saveSTL( preview_mesh.geometry, document.forms['stl_form'].elements['stl_filename'].value );" />
 
</form>
</div>


<!-- <script language="Javascript" type="text/javascript" src="prototype-1.6.0.3.js"></script> -->
<script language="Javascript" type="text/javascript" src="three.js"></script>

<script language="Javascript" type="text/javascript" src="Blob.js"></script>
<script language="Javascript" type="text/javascript" src="FileSaver.js"></script>
<script language="Javascript" type="text/javascript" src="STLBuilder.js"></script>

<script language="Javascript" type="text/javascript" src="StringFileExporter.js"></script>
<script language="Javascript" type="text/javascript" src="upload_bezier_json_file.js"></script>

<script language="Javascript" type="text/javascript" src="IKRS.js"></script>

<script language="Javascript" type="text/javascript" src="IKRS.ExtrudePathGeometry.js"></script>

<script language="Javascript" type="text/javascript" src="IKRS.Utils.js"></script>

<script language="Javascript" type="text/javascript" src="IKRS.Object.js"></script>
<script language="Javascript" type="text/javascript" src="IKRS.CubicBezierCurve.js"></script>
<script language="Javascript" type="text/javascript" src="IKRS.BezierCanvasHandler.js"></script>
<script language="Javascript" type="text/javascript" src="IKRS.BezierPath.js"></script>

<script language="Javascript" type="text/javascript" src="PreviewCanvasHandler.js"></script>

<script language="Javascript">

  function setBezierPath( bezierPath ) {
			this.bezierCanvasHandler.bezierPath = bezierPath;
			this.bezierCanvasHandler.redraw();
		      }

  //window.alert( JSON.stringify(IKRS) );
  //window.alert( "AA" );
  this.bezierCanvasHandler = new IKRS.BezierCanvasHandler();

</script>

</body> 
</html>