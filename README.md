
Path Extrusion Generator
========================

@author   Ikaros Kappler
@date     2013-09-11
@modified 2014-07-04
@version  0.2.36



License:
CC BY-NC-SA



Changelog
---------

[2014-07-04] v0.2.36
 - Added two new mesh features
   	 + shapeStyle: "circle" (default) or "oval"
	 + shapeTwist: percentage of rotations (still experimental)
 - Fixed a form issue: when de-selecting the 'split shape' options (the
   'base type' settings was still recognized which broke the mesh). 
 - Fixed the createHumanReadableTimestamp() function: added leading zeros.
 - Changed the default output file names to more expressive ones.

[2014-07-03]
 - IKRS.PathDirectedExtrudeGeometry.js: added the 'options.shapeTwist'
   param to the constructor.
 - Added the IKRS.ShapeFactory class and subclasses for circles and ovals.

[2014-07-02] v2.0.35
 - store_custom_dildo.php: changed the submit method to HTTP POST.
 - Added the setCookie() and getCookie() functions (main.js).
 - Added the saveInCookie() and loadFromCookie() functions (main.js, still testing, 
   not yet in use).
 - Added the Model->Publish menu (not yet visible).
 - Added the 'preserveDrawingBuffer' flag to the THREE.WebGLRenderer to enable
   taking screenshots.
 - New function: get3DScreenshotData() for taking screenshots (not yet in use).

[2014-07-01] v2.0.34
 - main.js: function createXMLHttpRequest() added.
 - Replaced the remote (!) save function by a less brute-force solution
   by using AJAX.
 - Added the idForm form to store remote IDs inside.
 - Added the UPDATE function for existing dildo designs (depending on passed id
   and user_id); if id is missing, a regular INSERT is made.
 
 - Note: Merchants should have a look at the new function in the 
         merchant_tools.js file. I also added the %id% placeholder
	 to the configured storage URL.

[2014-06-25]
 - IKRS.PathDirectedExtrudeGeometry: options.shapeAxisDistance added.

[2014-06-25] v0.2.33
 - Updated the FAQs: added the Presets howto.

[2014-06-19] v0.2.32
 - Added the preset menu and the presets.js config file.

[2014-06-19] v0.2.31
 - Updated JSZip to version 2.3.0, which fixed the "Constructor TextDecoder 
   requires 'new'" issue with FireFox.
 - ZIP files are now readable again.

[2014-06-19] v0.2.30
 - Fixed the DOM canvas issue (DOM element was moved by constructor).

[2014-06-19] v0.2.29
 - Made the canvas background images configurable. See the config.js file 
   near lines 52 and 59: 
   _DILDO_CONFIG.IMAGES.BEZIER_BACKGROUND and
   _DILDO_CONFIG.IMAGES.PREVIEW_BACKGROUND

[2014-06-17] v0.2.27
 - Since this version there is a code snippet example explaining how to
   to store dildo design on a server (in a database). This is just an example
   and not active. The site dildo-generator.com does _not_ store any design
   data.

[2014-05-16] v0.2.20
 - Click area bug fixed (zoom issue)

[2013-10-30]
 - Added background images to the 2D- and 3D-canvas.

[2013-10-29]
 - Added the VectorFactory to the preview handler.
 - Added a new function that arranges the wto splits (if split)
   on the horizontal plane.

[2013-10-25]
 - Moved all secondary controls the the new menu bar.

[2013-10-22]
 - Added a basic menu bar library (moo-tools_dropdown-menu).

[2013-10-15]
 - The mm-measurements are now applied to the STL models.

[2013-10-04]
 - Added process bar (display in the CSS message box).

[2013-10-02]
 - Added CSS message box for errors and warnings.

[2013-09-24]
 - Added ruler/measurements (in mm).
 - Shape scaling by moving bounding box nodes implemented.

[2013-09-18]
 - Bug fixed: the second last bezier point can be deleted now.

[2013-09-16]
 - The second last bezier curve was not deletable. This is fixed now.

[2013-09-12] 
   Implemented a better bezier curve splitting.

[2013-09-11] 
 - Zip file import implemented.





TODO
----
[2013-10-15]
 - The 'Merge Meshes' STL option should be included into the settings 
   import/export.

[2013-09-24]
 - The bezier scaling by bounding-box works so far but there is a
   boundary required to avoid the path to be scale to width=0 or	
   height=0.
 - [DONE 2013-10-15]
   The mm-measurements are not yet applied to the STL models.
 - The bezier-Settings file should also store scaling and
   draw offset.
   When loading a file these settings should be restored so the bezier
   path is at the same position.

[2013-09-16]
 - Add an enhanced polygon triangulation algorithm for the case
   the mesh is split; the cut is not yet properly filled. Vertically
   non-convex bezier curves cause errors in the mesh.
 - [DONE 2013-09-18]
   Bug: the second last bezier point cannot be deleted.

[2013-09-13]
 - Fix Safari incompatibility.
 - [DONE 2013-10-02]
   Add CSS message box for errors and warnings.
 - [DONE 2013-10-04]
   Add process bar.
 - Add a compatibility check with error message.

[2013-09-12]
 - Add dummy console for older browsers

[2013-09-11]
 - [DONE 2013-09-11] 
   Zip file import
 - [DONE 2013-09-24]
   Add ruler/measurements
 - [DONE 2013-09-18]
   Implement split mesh
 - Implement second inner perpendicular hull (for wax)
 - [DONE 2013-09-12] 
   Implement a better bezier curve splitting
 - Add an undo-function to the bezier editor
 - [DONE 2013-09-24]
   Shape scaling by moving bounding box nodes








Used libraries
--------------

 - three.js
 - jszip.js (v1.0.1-23)
 - jszip-deflate.js
 - jszip-load.js
 - base64-binary.js
 - FileSaver.js
 - Blob.js
 - Moo-Tools (dropdown-menu, core 1.4.5)





Thanks to
---------
 
 [three.js]
   mrdoob / http://mrdoob.com/ 
   Larry Battle / http://bateru.com/news

 [baseg64-binary.js]
   Daniel Guerrero

 [jszip.js]
   Stuart Knightley <stuart [at] stuartk.com>

 [FileSaver.js]
  Eli Grey

 [STLBuilder inspirations]
   Paul Kaplan
 
 [Moo-Tools dropdown menu]
   mootools / https://github.com/mootools  
   <unknown author>
 
 [mono-dc-monochrome-social-icons]
   Natko Hasiæ & designchair.com

 [WebGL screenshot howto]
   Dinesh Saravanan