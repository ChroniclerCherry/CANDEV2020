import plotly.express as px
import pandas as pd
import numpy as np

data = pd.read_csv(r"CANDEV2020/TransferPayments.csv")
cleaned = data.groupby(['MINC','DEPT_EN_DESC','FSCL_YR'])["AGRG_PYMT_AMT"].sum().reset_index(name='Sum')

graph = px.bar(cleaned,x = 'MINC',y='Sum',
animation_frame="FSCL_YR",
labels={'MINC':'Department',"Sum":"Total Payment Amount","FSCL_YR":"Fiscal Year"})
graph.write_html('DepartmentPaymentPerFiscalYear.html', auto_open=True)