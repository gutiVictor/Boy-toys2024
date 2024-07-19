import sys
from PyQt5.QtWidgets import QApplication, QWidget, QLabel, QLineEdit, QPushButton, QVBoxLayout, QHBoxLayout, QMessageBox
from openpyxl import Workbook, load_workbook
from datetime import datetime

class VentanaPrincipal(QWidget):
    def __init__(self):
        super().__init__()
        self.initUI()
        self.initExcel()

    def initUI(self):
        self.setWindowTitle('Aplicación de Inventario')
        self.setGeometry(100, 100, 400, 300)

        self.label_codigo = QLabel('Código de Barras:')
        self.edit_codigo = QLineEdit()

        self.label_caja = QLabel('# de Caja:')
        self.edit_caja = QLineEdit()

        self.label_cantidad = QLabel('Cantidad:')
        self.edit_cantidad = QLineEdit()

        self.btn_agregar = QPushButton('Agregar')
        self.btn_agregar.clicked.connect(self.agregarProducto)

        vbox = QVBoxLayout()
        vbox.addWidget(self.label_codigo)
        vbox.addWidget(self.edit_codigo)
        vbox.addWidget(self.label_caja)
        vbox.addWidget(self.edit_caja)
        vbox.addWidget(self.label_cantidad)
        vbox.addWidget(self.edit_cantidad)
        vbox.addWidget(self.btn_agregar)

        self.setLayout(vbox)

    def initExcel(self):
        self.archivo_excel = 'inventario.xlsx'
        self.libro_excel = Workbook()
        self.hoja_excel = self.libro_excel.active
        self.hoja_excel.append(['Fecha', 'Código de Barras', '# de Caja', 'Cantidad'])

    def agregarProducto(self):
        codigo = self.edit_codigo.text()
        caja = self.edit_caja.text()
        cantidad = self.edit_cantidad.text()
        fecha = datetime.now().strftime('%Y-%m-%d %H:%M:%S')

        self.hoja_excel.append([fecha, codigo, caja, cantidad])
        self.libro_excel.save(self.archivo_excel)

        QMessageBox.information(self, 'Producto agregado', 'Producto agregado al inventario.')

if __name__ == '__main__':
    app = QApplication(sys.argv)
    ventana = VentanaPrincipal()
    ventana.show()
    sys.exit(app.exec_())
