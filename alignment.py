#!/usr/bin/env python


def getAlignments(table,S,T,i,j,alignedS,alignedT):
    
    if i==0 or j==0:
        print '\n'
        print 'Aligned with edit distance %d:' % (table[len(T)][len(S)])
        print alignedS[::-1]
        print alignedT[::-1]
        
        return
    d = 1
    if S[j-1] == T[i-1]:
        d = 0
    diag = table[i-1][j-1] + d
    up = table[i-1][j]+1
    left = table[i][j-1]+1
    minimum=min(diag,up,left)
    if minimum==up:
        
        getAlignments(table,S,T,i-1,j,alignedS+'_',alignedT+T[i-1])
    if minimum==left:
        
        getAlignments(table,S,T,i,j-1,alignedS+S[j-1],alignedT+'_')
    if minimum==diag:
    
        getAlignments(table,S,T,i-1,j-1,alignedS+S[j-1],alignedT+T[i-1])
        
        
        
def stredit (S,T,mismatch_penalty=1, gap_penalty=1,gap_extend_penalty=1):
    mismatch_penalty=int(mismatch_penalty)
    gap_penalty=int(gap_penalty)
    gap_extend_penalty=int(gap_extend_penalty)

    len1 = len(S) # vertically
    len2 = len(T) # horizontally
 
    print "Aligning " + S + " and " + T
 # Allocate the table
    table = [None]*(len2+1)
    for i in xrange(len2+1): table[i] = [0]*(len1+1)
 
 # Initialize the table
    for i in xrange(1, len2+1): table[i][0] = i # fill top row and first column with 0,1,2,3,4...
    for i in xrange(1, len1+1): table[0][i] = i
 
 # Do dynamic programming
    for i in xrange(1,len2+1):
         for j in xrange(1,len1+1):
             d = mismatch_penalty
             if S[j-1] == T[i-1]:
                 d = 0
             table[i][j] = min(table[i-1][j-1] + d,
                                 table[i-1][j]+gap_penalty,
                                 table[i][j-1]+gap_penalty)
             
    write= "    0";
    for j in xrange(0,len1):
        write+=" %4s" % S[j]
    print write
    
    
    
    for i in xrange(0,len2+1):
        write=""
        if (i>0):
            write+= " %s" % T[i-1]
        else:
            write += " 0"

        for j in xrange(0,len1+1):
            write += " %4d" % table[i][j]
        print write
        

    alignedS=''
    alignedT=''
    getAlignments(table,S,T,len2,len1,alignedS,alignedT)




#stredit(S,T,mismatch_penalty=1, gap_penalty=1)





