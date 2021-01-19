FROM python:3
COPY ./webapp/requirements.txt /app/requirements.txt
WORKDIR /app
RUN pip install -r requirements.txt
COPY ./webapp/ /app
ENTRYPOINT ["python"]
CMD ["server.py"]
