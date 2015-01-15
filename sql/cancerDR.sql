use cancerdr;

SELECT 
    *
FROM
    ref_drug
        LEFT JOIN
    (methylation, ref_cell_lines, ref_gene, info_cell_lines) ON ref_drug.drugID = methylation.drugID
        AND methylation.cellID = info_cell_lines.ID
        AND methylation.geneID = ref_gene.geneID;
        

SELECT 
    ref_drug.*,
    info_cell_lines.ID,
    info_cell_lines.cellLineName,
    info_cell_lines.Histology,
    info_cell_lines.SitePrimary,
    ref_gene.geneID,
    ref_gene.geneName,
    info_pubmed_methylation.pmid,
    info_pubmed_methylation.pmid
FROM
    ref_drug
        LEFT JOIN
    methylation ON ref_drug.drugID = methylation.drugID
        LEFT JOIN
    info_cell_lines ON methylation.cellID = info_cell_lines.ID
        LEFT JOIN
    ref_gene ON methylation.geneID = ref_gene.geneID
    left join 
    info_pubmed_methylation on methylation.pmid = info_pubmed_methylation.pmid
WHERE
    ref_drug.drugID = 'D043';