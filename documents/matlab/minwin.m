function minwin()
%MINWIN Minimize current MATLAB window
%
%28 July 2016, Benjamin Shanahan.
mf = com.mathworks.mde.desk.MLDesktop.getInstance.getMainFrame;
mf.setMinimized(1);