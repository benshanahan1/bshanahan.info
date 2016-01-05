function deleteFileList(fileList, debug)
% deleteAll(fileList, debug)
%
% Benjamin Shanahan, 20150430
%
% Takes a list of files (cell) and removes all that exist. If parameter
% 'debug' is set to true (default false), debug output will be printed to
% command window. Good for cleaning up processed_data/ file directory and
% removing old files which are replicated in all LFP data folders.

if ~exist('debug', 'var')
    debug = false;
end

% convert to row vector
if ~isrow(fileList)
    fileList = fileList';
end

count = 0;

% loop through all entries in fileList
for ff = fileList
    f = ff{1};
    if exist(f, 'file')
        delete(f);
        count = count + 1;
    end
end

if debug
    if count ~= 0
        out(['Deleted ' int2str(count) ' files successfully.']);
    else
        out('No files discovered or deleted.');
    end
end

return;