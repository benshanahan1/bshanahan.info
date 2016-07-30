function filelist = getfiles(parentdir,str2match)
%GETFILES Return list of all files in directory matching a string
%   GETFILES(PARENTDIR,STR2MATCH) Returns a list of all files in given
%   directory, including subdirectories, matching a specified string.
%
%9 April 2015, Benjamin Shanahan.

filelist = subdir(parentdir);
idxLFP   = ...
    not(cellfun('isempty', strfind(filelist,str2match)));  % match string
filelist = filelist(idxLFP);

% -------------------------------------------------------------------------

    function filelist = subdir(dirName,regexp)
        %SUBDIR Return list of all files and folders in a directory
        %   SUBDIR(DIRNAME,REGEXP) Returns list of all files in a directory,
        %   including subdirectories, matching a specific Regex pattern.
        %
        %Source: http://stackoverflow.com/questions/2652630/how-to-get-all-files-
        %        under-a-specific-directory-in-matlab
        %
        %9 April 2015, Benjamin Shanahan.
        
        dirData = dir(dirName);
        dirIndex = [dirData.isdir];
        filelist = {dirData(~dirIndex).name}';
        
        useRegex = exist('pattern', 'var');
        
        if ~isempty(filelist)
            filelist = cellfun(@(x) fullfile(dirName, x), filelist, ...
                'UniformOutput', false);
            
            if useRegex
                matchstart = regexp(filelist, regexp);
                filelist = filelist(~cellfun(@isempty, matchstart));
            end
        end
        
        subDirs = {dirData(dirIndex).name};
        validIndex = ~ismember(subDirs, {'.','..'});
        
        for iDir = find(validIndex)
            nextDir = fullfile(dirName, subDirs{iDir});
            
            if useRegex
                filelist = [filelist; subdir(nextDir, regexp)];
            else
                filelist = [filelist; subdir(nextDir)];
            end
        end
        
    end

end