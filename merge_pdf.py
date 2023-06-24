import os
import sys
from PyPDF2 import PdfMerger

# Get the paths to the uploads and final folders
uploads_folder = 'uploads/files/'
final_folder = 'uploads/files/final/'

# Get the list of PDF files in the uploads folder
pdf_files = [f for f in os.listdir(uploads_folder) if f.endswith('.pdf')]

# Create a PDF merger object
merger = PdfMerger()

# Merge the PDF files
for pdf_file in pdf_files:
    file_path = os.path.join(uploads_folder, pdf_file)
    merger.append(file_path)

# Save the merged PDF to the final folder
if not os.path.exists(final_folder):
    os.makedirs(final_folder)

output_path = os.path.join(final_folder, 'merged.pdf')
merger.write(output_path)
merger.close()
