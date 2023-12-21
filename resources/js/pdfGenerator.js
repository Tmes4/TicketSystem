import jsPDF from 'jspdf';

const generatePDF = () => {
    const doc = new jsPDF();
    doc.text('Hello world!', 10, 10);
    doc.save('output.pdf');
};

export default generatePDF;