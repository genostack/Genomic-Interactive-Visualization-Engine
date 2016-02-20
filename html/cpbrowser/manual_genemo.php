<?php
	require_once (realpath(dirname(__FILE__) . '/../../includes/common_func.php'));	
	require_once (realpath(dirname(__FILE__) . "/../../includes/session.php"));
	
	$res = initialize_session();
	$encodeOn = $res['encodeOn'];
	$in_debug = $res['in_debug'];
	$genemoOn = $res['genemoOn'];
	unset($res);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="CepBrowser Manual,Genome Browser,Visualization" />
<meta name="description" content="This is the manual for CEpBrowser (Comparative Epigenome Browser). In CEpBrowser, genomes from multiple species are be shown side by side to enhance the comparison of various features, such as transcript information, epigenomic modifications, SNP's, transcription factor binding sites and so on, aiding users in comparative genomic research." />
<title>GENEMO Manual</title>
<script src="components/bower_components/webcomponentsjs/webcomponents.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=Roboto:500,400italic,700italic,700,400' rel='stylesheet' type='text/css'>
<link href="mainstyles.css" rel="stylesheet" type="text/css" />
<link rel="import" href="components/bower_components/core-icons/core-icons.html">
<style type="text/css">
#GeneLookUp {
	width: 270px;
}
#geneInformation {
	width: 270px;
}
#colorPalette {
	width: 200px;
}
#Navigation {
	width: 270px;
}
#SampleSelection {
	width: 300px;
}
#TrackSetting {
	width: 366px;
}
#encodeLogo {
	border: none;
}
body {
	background-color: #FFFFFF;
	margin-right: 15px;
	margin-top: 5px;
	margin-bottom: 5px;
	margin-left: 5px;
	overflow: auto;
}
.style1 {
	color: #FFFFFF
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
	line-height: 21px;
	margin-left: 10px;
	padding-left: 5px;
}
.style2 li {
	margin-left: -20px;
}
</style>
</head>

<body>
<?php include_once(realpath(dirname(__FILE__) . '/../../includes/analyticstracking.php')); ?>
<a name="top" id="top"></a>
<div class="Title">GENEMO Search Manual </div>
<div class="Header1"><a href="#top"></a>Index</div>
<ul>
  <li class="style2"><a href="#intro">Introduction</a></li>
  <li class="style2"><a href="#datasets">Available Datasets</a>
  </li>
  <li class="style2"><a href="#usage">Using GENEMO Search </a>
    <ul>
      <li><a href="#input">Select Input Data</a></li>
      <li><a href="#dataSelect">Choose Epigenetic Data Sets to Search</a></li>
      <li><a href="#output">Visualizing Output</a></li>
    </ul>
  </li>
  <li class="style2"><a href="#contact">Contact Us</a></li>
  <li class="style2"><a href="#reference">References</a></li>
</ul>
<div class="Header1 clearFix"><a href="#top"><div class="floatRight"><core-icon class="smallInline" icon="arrow-drop-up" alt="up to index"></core-icon> Index</div><a name="intro" id="intro"></a>Introduction</div>
<p class="normaltext">GENEMO Search is a genome-wide search engine developed to search the entire genome for similar regions between any given epigenetic signal and known epigenetics study data sets. It is developed by the Zhong Lab in University of California, San Diego.</p>
<p class="normaltext">In GENEMO Search, you can easily search similar regions among <a href="http://www.genome.gov/10005107" target="_blank">Encyclopedia of DNA Elements</a> (ENCODE) and mouseENCODE database entries in human or mouse, including chromatin accessibility, histone modification, transcription factor binding sites and DNase-seq peaks. Similar regions are defined as the region with a local maximum similarity value. Figure 1 below shows the results from GENEMO Search.
<p class="inlineImage"><img src="images/Figure_1_Mechanism.png" alt="GENEMO Search Goals" width="588" height="197" /><br />
<span class="panel">Figure 1</span> How GENEMO Search works. GENEMO Search can be used to find the similar regions between user input and all selected tracks. In this example, <em>M</em> tracks that may contain DNase-Seq, TFBS or histone modifications data are chosen, and <em>K</em> local similar regions are found in chromosome 1 in the result.</p>
<div style="clear: both;"></div>
<p class="normaltext">You can submit any peak or bigWig file from your experiment to search the ENCODE database for similar regions across the genome. This may help in finding genomic regions of interest, related epigenetic information or other insights for your research.</p>
<p class="normaltext">The gene track displaying mechanism in GENEMO Search is powered by UCSC Genome Browser (<a href="http://genome.ucsc.edu/">http://genome.ucsc.edu/</a>)<sup><a name="cite1_ref" id="cite1_ref"></a><a href="#cite1">[1]</a></sup> with some source modification.</p>
<div class="Header1 clearFix"><a href="#top"><div class="floatRight"><core-icon class="smallInline" icon="arrow-drop-up" alt="up to index"></core-icon> Index</div></a> <a name="datasets" id="datasets"></a>Available Datasets</div>
<p class="normaltext">So far two species are supported in GENEMO Search:</p>
<ul class="normalnotes">
  <li>Homo sapiens (human), reference sequence <a href="/cgi-bin/hgGateway?clade=mammal&amp;org=Mouse" target="_blank">GRCh37/hg19</a>.<sup><a name="cite4_ref" id="cite4_ref"></a><a href="#cite4">[2]</a></sup></li>
  <li>Mus musculus (mouse), reference sequence <a href="/cgi-bin/hgGateway?clade=mammal&amp;org=Mouse&amp;db=mm9" target="_blank">NCBI37/mm9</a>.<sup><a name="cite5_ref" id="cite5_ref"></a><a href="#cite5">[3]</a></sup></li>
</ul>
<div style="clear: both;"></div>
<div class="embededImage" id="encodeLogo"><img src="images/ENCODE_scaleup_logo.png" width="170" height="102" alt="ENCODE Logo" /></div>
<p class="normaltext">ENCODE and mouseENCODE data are incorporated in GENEMO as epigenetic data sets for search and visualization to provide better insights from the vast amount data within the project.</p>
<p class="normaltext">To learn more about ENCODE and mouseENCODE, please check the following websites:</p>
<ul class="normalnotes">
  <li><a href="http://genome.ucsc.edu/encode/">ENCODE Project</a> and <a href="http://chromosome.sdsc.edu/mouse/download.html">mouseENCODE Project</a></li>
  <li>ENCODE Data Matrix (<a href="http://genome.ucsc.edu/encode/dataMatrix/encodeDataMatrixHuman.html">human</a> and <a href="http://genome.ucsc.edu/encode/dataMatrix/encodeDataMatrixMouse.html">mouse</a>)</li>
</ul>
<div class="Header1 clearFix"><a href="#top"><div class="floatRight"><core-icon class="smallInline" icon="arrow-drop-up" alt="up to index"></core-icon> Index</div></a><a name="usage" id="intro3"></a>Using GENOMO Search</div>
<p class="normaltext">The GENEMO Search user interface contains four panels: <span class="panel">Input file</span> panel, <span class="panel">gene / region selection</span> panel, <span class="panel">navigation</span> panel and <span class="panel">visualization</span> panel. The left panels can be folded so that all the panels are accessible under a smaller screen resolution. The entire left panel group can also be hidden to further provide space for the data displayed by the <span class="panel">visualization</span> panel.</p>
<div class="Header2 clearFix"><a href="#top"><div class="floatRight"><core-icon class="smallInline" icon="arrow-drop-up" alt="up to index"></core-icon> Index</div></a><a name="input" id="intro4"></a>Select Input Data</div>
<div class="embededImage" id="GeneLookUp"> <img src="images/Figure_2_SearchPanel.png" alt="Gene Lookup Panel" width="260" height="486" /><br />
<span class="panel"><strong>Figure 2</strong></span> <span class="genemo-card-title">Input file</span> panel in GENEMO Search.</div>
<p class="normaltext">You need to use  <span class="genemo-card-title">Input file</span> panel to provide input data in GENEMO Search (see Figure 2 to the right). By specifying the following information, you can search the epigenetic data sets for regions similar to your experiment results:</p>
<ul class="normalnotes">
  <li>Choose a reference genome you would like to search against (human or mouse). This should be the species used in your experiment.</li>
  <li>Provide a custom peak file from your experiment. The custom peak file should be in a tab delimited text file, BED format or any format that has at least three columns: chromosome name, start position and end position. You need to choose one of the following two ways to provide the file:
    <ul>
      <li>Put your file on any online server and make it publicly accessible, providing the URL in <span class="paper-input-text">URL for data file</span></li>
      <li>Directly upload the file with <span class="paper-button-text">Upload local file</span></li>
    </ul>
  (Notice that if you choose one method, any input in the other method will be resetted to avoid interference and confusion. For example, if you upload a local file, <span class="paper-input-text">URL for data file</span> will be cleared.)</li>
  <li>You may also provide a bigWig file as input by specifying the URL of said bigWig file, GENEMO will try to determine file type by the extension of the file (.bw or .bigWig). Notice that bigWig files cannot be recognized when uploaded directly.</li>
  <li>(Optional) Provide your email address. If you have chosen a lot of tracks to search, it may take GENEMO Search dozens of minutes to more than one hour to finish the computation. If you have provided your email address, you will receive an email with a URL to visualize the results once the computation is complete.</li>
  <li>(Optional) If you specified a peak file and it comes from some analog data (in wig or bigWig format), you may provide a URL of the analog data file for display purposes in <span class="paper-input-text">Display file URL</span>. This file is used to provide better visualization results and will not be used in computation.</li>
  <li>(Optional) Choose tracks/data you want to compare by clicking <span class="paper-button-text">Data selection</span>. (Please refer to the <span class="panel">Choose epigenetic data sets to search </span>section below.)</li>
</ul>
<p class="normaltext">After provided the required information, click <span class="paper-button-text colored">
  <core-icon class="smallInline" icon="search" alt="search"></core-icon>
        Search</span> to initialize your search.</p>
<div style="clear: both;"></div>
<div class="Header2 clearFix"><a href="#top"><div class="floatRight"><core-icon class="smallInline" icon="arrow-drop-up" alt="up to index"></core-icon> Index</div>
</a><a name="dataSelect" id="dataSelect"></a>Choose Epigenetic Data Sets to Search</div>
<p class="normaltext">GENEMO Search incorporated all data sets from ENCODE project as potential search targets. To choose the specific data sets you would like to search, you can click <span class="paper-button-text">Data selection</span> to open the <span class="panel">data selection</span> panel.</p>
<p class="inlineImage"><img src="images/Figure_3_DataSelection.png" width="500" height="423" alt="Data Selection" /><br />
<span class="panel">Figure 3</span> Data selection panel. Three different methods to select the data for comparison are shown.</p>
<p class="normaltext">To select the specific data sets for comparison, you can use a combination of three methods:</p>
<ul class="normalnotes">
  <li>Select ENCODE data sets individually with the checkboxes in the list;</li>
  <li>Use <strong>Choose sample type</strong> to open the <span class="panel">Sample list</span> panel, and choose data sets by sample type;</li>
  <li>Check &quot;Use all ENCODE data&quot; to select all data sets for searching. (NOTE: the computation time will be quite significant if this checkbox is checked, so providing an email address is strongly recommended.)</li>
</ul>
<p class="normaltext">Epigenetic signals in ES cells (H1 in human, E14 in mouse) are selected by default.</p>
<div class="Header2 clearFix"><a href="#top"><div class="floatRight"><core-icon class="smallInline" icon="arrow-drop-up" alt="up to index"></core-icon> Index</div></a><a name="output" id="output"></a>Visualizing Output</div>
<p class="normaltext">The output includes the<span class="panel">Gene / Region Selection</span>, <span class="panel">Navigation</span> and <span class="panel">Visualization</span> panels (see Figure 4 below). After the calculation is complete, the resulting gene regions will be shown in the <span class="panel">Gene / Region Selection</span> panel. The results will be ordered according to  scores obtained by the algorithm. Select the Visualize button for any one result to visualize it in the <span class="panel">Visualization</span> panel.</p>
<p class="normaltext">The&nbsp;<span class="panel">Navigation</span>&nbsp;panel  is provided to navigate through the selected gene region. There are  two types of controls in the navigation panel: sliding controls that enable the user to  slide to the upstream/downstream regions of the current view, and zooming controls that allow the user to zoom in/out a certain part of the genome.</p>
<p class="inlineImage"><img src="images/Figure_4_UI.png" alt="GENEMO Search Goals" width="600" height="293" /><br />
<span class="panel">Figure 4</span> This example of the output  shows the result from the input file. The <span class="panel">Input file </span>Panel (collapsed), <span class="panel">Gene / Region Selection</span> Panel, <span class="panel">Navigation</span> Panel and <span class="panel">Visualization</span> Panel are shown.</p>
<div style="clear: both;"></div>

<div class="Header1 clearFix"><a href="#top"><div class="floatRight"><core-icon class="smallInline" icon="arrow-drop-up" alt="up to index"></core-icon> Index</div></a><a name="contact" id="intro9"></a>Contact Us</div>
<p class="normaltext">If you have any questions or comments regarding to GENEMO Search, you may contact us by sending an email to Xiaoyi Cao (<a href='mailt&#111;&#58;x9%&#54;3%61o&#37;&#52;0%&#55;5&#99;s&#100;&#46;ed&#117;'>x9cao <strong>at</strong> ucsd <strong>dot</strong> edu</a>). </p>
<div class="Header1 clearFix"><a href="#top"><div class="floatRight"><core-icon class="smallInline" icon="arrow-drop-up" alt="up to index"></core-icon> Index</div></a><a name="reference" id="intro7"></a>References</div>
<ol class="normaltext">
  <li><a name="cite1" id="cite1"></a> <a href="#cite1_ref">↑</a>Kent WJ, <em>et al.</em> (2002) <a href="http://www.genome.org/cgi/content/abstract/12/6/996" target="_blank">The human genome browser at UCSC</a>. <em>Genome Research </em>12(6): 996-1006.</li>
  <li><a name="cite4" id="cite4"></a> <a href="#cite4_ref">↑</a>International Human Genome Sequencing Consortium (2001). <a href="http://www.nature.com/nature/journal/v409/n6822/abs/409860a0.html" target="_blank">Initial sequencing and analysis of the human genome</a>. <em>Nature,</em> 409: 860-921.</li>
  <li> <a name="cite5" id="cite5"></a> <a href="#cite5_ref">↑</a>Mouse Genome Sequencing Consortium (2002). <a href="http://www.nature.com/nature/mousegenome/" target="_blank">Initial sequencing and comparative analysis of the mouse genome</a>. <em>Nature</em>, 420, 520-562. <br />
  </li>
</ol>
</body>
</html>