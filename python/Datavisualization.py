import plotly.express as px
import pandas as pd
import numpy as np

data = pd.read_csv(r"TransferPayments.csv")
cleaned = data.groupby(['DEPT_EN_DESC','FSCL_YR'])["AGRG_PYMT_AMT"].mean().reset_index(name='Average')

graph = px.bar(cleaned,x = 'DEPT_EN_DESC',y='Average',
animation_frame="FSCL_YR",
labels={'DEPT_EN_DESC':'Department name',"Average":"Average Payment Ammount","FSCL_YR":"Fiscal Year"})
graph.write_html('first_figure.html', auto_open=True)